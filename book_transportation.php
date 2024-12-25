<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $aadharNumber = $_POST['aadhar_number'];
    $numPeople = $_POST['no_of_people'];
    $pickUpLocation = $_POST['pick_up_location'];
    $dropLocation = $_POST['drop_location'];

    $stmt = $conn->prepare("INSERT INTO transportation (aadhar_number, no_of_people, pick_up_location, drop_location) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("siss", $aadharNumber, $numPeople, $pickUpLocation, $dropLocation);

    if ($stmt->execute()) {
        echo "Transportation booking successful!";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
