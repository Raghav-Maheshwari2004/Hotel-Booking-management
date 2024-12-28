<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $aadharNumber = $_POST['aadhar_number'];
    $totalRoomCost = 0;
    $totalAmenityCost = 0;

    // Room Prices (per day)
    $roomPricePerDay = 1000;

    // Fetch Room Booking Details
    $roomQuery = $conn->prepare("SELECT full_name, no_of_rooms, check_in_date, check_out_date, food_choices FROM room WHERE aadhar_number = ?");
    if (!$roomQuery) {
        die("Error preparing room query: " . $conn->error);
    }
    $roomQuery->bind_param("s", $aadharNumber);
    $roomQuery->execute();
    $roomResult = $roomQuery->get_result();

    if ($roomResult->num_rows > 0) {
        echo "<h2>Room Booking Details:</h2>";
        while ($row = $roomResult->fetch_assoc()) {
            $checkInDate = new DateTime($row['check_in_date']);
            $checkOutDate = new DateTime($row['check_out_date']);
            $interval = $checkInDate->diff($checkOutDate);
            $days = $interval->days;
            $totalRoomCost += $row['no_of_rooms'] * $days * $roomPricePerDay;

            echo "Name: " . $row['full_name'] . "<br>";
            echo "Rooms: " . $row['no_of_rooms'] . "<br>";
            echo "Check-in Date: " . $row['check_in_date'] . "<br>";
            echo "Check-out Date: " . $row['check_out_date'] . "<br>";
            echo "Food Choices: " . $row['food_choices'] . "<br>";
            echo "Room Cost: " . ($row['no_of_rooms'] * $days * $roomPricePerDay) . " INR<br><br>";
        }
    } else {
        echo "No room booking found.<br>";
    }

    $roomQuery->close();

    // Fetch Amenities Booking Details
    $amenitiesQuery = $conn->prepare("SELECT amenities FROM amenities WHERE aadhar_number = ?");
    if (!$amenitiesQuery) {
        die("Error preparing amenities query: " . $conn->error);
    }
    $amenitiesQuery->bind_param("s", $aadharNumber);
    $amenitiesQuery->execute();
    $amenitiesResult = $amenitiesQuery->get_result();

    // Amenities Prices
    $amenityPrices = [
        "gym" => 2400,
        "swimming pool" => 1200,
        "spa" => 3000,
        "outdoor games" => 1300,
        "indoor games" => 1000,
        "trekking" => 3000
    ];

    if ($amenitiesResult->num_rows > 0) {
        echo "<h2>Amenities Booking Details:</h2>";
        while ($row = $amenitiesResult->fetch_assoc()) {
            $amenities = explode(", ", $row['amenities']);
            foreach ($amenities as $amenity) {
                $price = $amenityPrices[$amenity] ?? 0;
                $totalAmenityCost += $price;
                echo "Amenity: " . ucfirst($amenity) . " - " . $price . " INR<br>";
            }
        }
        echo "Total Amenities Cost: " . $totalAmenityCost . " INR<br><br>";
    } else {
        echo "No amenities booking found.<br>";
    }

    $amenitiesQuery->close();

    // Fetch Transportation Booking Details
    $transportQuery = $conn->prepare("SELECT pick_up_location, drop_location, no_of_people FROM transportation WHERE aadhar_number = ?");
    if (!$transportQuery) {
        die("Error preparing transportation query: " . $conn->error);
    }
    $transportQuery->bind_param("s", $aadharNumber);
    $transportQuery->execute();
    $transportResult = $transportQuery->get_result();

    if ($transportResult->num_rows > 0) {
        echo "<h2>Transportation Booking Details:</h2>";
        while ($row = $transportResult->fetch_assoc()) {
            echo "Pick-up Location: " . $row['pick_up_location'] . "<br>";
            echo "Drop Location: " . $row['drop_location'] . "<br>";
            echo "Number of People: " . $row['no_of_people'] . "<br><br>";
        }
    } else {
        echo "No transportation booking found.<br>";
    }

    $transportQuery->close();
    $conn->close();

    // Total Cost Calculation
    $totalCost = $totalRoomCost + $totalAmenityCost;
    echo "<h2>Total Billing Cost: " . $totalCost . " INR</h2>";
}
