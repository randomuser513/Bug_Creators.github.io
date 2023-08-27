<?php 

$conn = new mysqli("localhost", "root", "root", "upcycletext");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $dtitle = $_POST["dtitle"];
    $ddescription = $_POST["ddescription"];
    $dusername = $_POST['dusername']; 
    $id = $_POST['id']; 

    $sql = "INSERT INTO comments (discussion_title, id, username, description) VALUES ('$dtitle', '$id', '$dusername', '$ddescription')";

    if ($conn->query($sql) === TRUE) {
        header("Location: forumtrial.php"); // Redirect to the discussion list
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
$conn->close();

?> 