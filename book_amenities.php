<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $aadharNumber = $_POST['aadhar_number'];
    $amenities = $_POST['amenity'];
    $amenitiesList = implode(", ", $amenities);

    $amenitiesCost = 0;
    $prices = ["gym" => 2400, "swimming pool" => 1200, "spa" => 3000, "outdoor games" => 1300, "indoor games" => 1000, "trekking" => 3000];

    foreach ($amenities as $amenity) {
        $amenitiesCost += $prices[$amenity];
    }

    $stmt = $conn->prepare("INSERT INTO amenities (aadhar_number, amenities) VALUES (?, ?)");
    $stmt->bind_param("ss", $aadharNumber, $amenitiesList);

    if ($stmt->execute()) {
        echo "Amenities booked successfully! Total amenities cost: " . $amenitiesCost . " INR";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
