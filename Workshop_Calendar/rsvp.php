<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "upcycletext";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // Set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Get data from AJAX request
    $uid = $_POST['uid'];
    $event_name = $_POST['event_name'];
    $event_datetime = $_POST['event_datetime'];

    // Prepare the SQL statement
    $stmt = $conn->prepare("INSERT INTO event_rsvp (uid, event_name, event_datetime) VALUES (:uid, :event_name, :event_datetime)");

    // Bind parameters
    $stmt->bindParam(':uid', $uid);
    $stmt->bindParam(':event_name', $event_name);
    $stmt->bindParam(':event_datetime', $event_datetime);

    // Execute the statement
    $stmt->execute();

    echo "RSVP inserted successfully";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

$conn = null;
?>
