<?php
// Database configuration
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "upcycletext";

try {
    // Create a PDO connection
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["event_name"]) && isset($_POST["uid"])) {
        $event_name = $_POST["event_name"];
        $username = $_POST["uid"];
        
        // Retrieve user's ID based on username
        $stmt = $conn->prepare("SELECT uid FROM userinfo WHERE username = :username");
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($result) {
            $user_id = $result['uid'];
            
            // Insert RSVP using the user ID and event name
            $stmt = $conn->prepare("INSERT INTO event_rsvp (uid, event_name, event_datetime) VALUES (:user_id, :event_name, NOW())");
            $stmt->bindParam(':user_id', $user_id);
            $stmt->bindParam(':event_name', $event_name);
            $stmt->execute();
            
            echo "RSVP successfully added!";
        } else {
            echo "User not found.";
        }
    } else {
        echo "Invalid data received.";
    }
}

$conn = null; // Close the connection
?>
