<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullName = $_POST['full_name'];
    $aadharNumber = $_POST['aadhar_number'];
    $numPersons = $_POST['no_of_persons'];
    $numRooms = $_POST['no_of_rooms'];
    
    // Format check-in and check-out dates
    $checkIn = date('Y-m-d', strtotime($_POST['check_in_date']));
    $checkOut = date('Y-m-d', strtotime($_POST['check_out_date']));

    $foodChoices = implode(", ", $_POST['food_choices']); // Assuming it's an array of selected food choices

    // Calculate the number of days between check-in and check-out
    $checkInDate = new DateTime($checkIn);
    $checkOutDate = new DateTime($checkOut);
    $days = $checkInDate->diff($checkOutDate)->days;

    // Calculate the room cost (example: 1000 INR per room per day)
    $roomCost = $numRooms * $days * 1000;

    // Prepare the SQL statement to insert the booking
    $sql = "INSERT INTO room (full_name, aadhar_number, no_of_persons, no_of_rooms, check_in_date, check_out_date, food_choices) 
            VALUES (?, ?, ?, ?, ?, ?, ?)";

    // Check if the statement preparation was successful
    if ($stmt = $conn->prepare($sql)) {
        // Bind parameters to the statement
        $stmt->bind_param("ssiiiss", $fullName, $aadharNumber, $numPersons, $numRooms, $checkIn, $checkOut, $foodChoices);

        // Execute the statement and check if it's successful
        if ($stmt->execute()) {
            echo "Room booking successful! Total room cost: " . $roomCost . " INR";
        } else {
            echo "Error executing the query: " . $stmt->error;
        }

        // Close the statement
        $stmt->close();
    } else {
        // If preparation failed, show the error
        echo "Error preparing the SQL query: " . $conn->error;
    }

    // Close the connection
    $conn->close();
}
?>
