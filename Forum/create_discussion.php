<?php
$conn = new mysqli("localhost", "root", "root", "upcycletext");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST["title"];
    $description = $_POST["description"];
    $username = $_POST['username']; 

    $sql = "INSERT INTO discussions (title, description, username) VALUES ('$title', '$description', '$username')";

    if ($conn->query($sql) === TRUE) {
        header("Location: forumtrial.php"); // Redirect to the discussion list
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}


$conn->close();
?>
