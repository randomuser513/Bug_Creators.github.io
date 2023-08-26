<?php
require_once 'common.php';

// WRITE YOUR CODES HERE

$tmp_username = ''; 

if (isset($_SESSION['fail'])){ 
    $tmp_username = $_SESSION['fail']; 
    unset($_SESSION['fail']); 
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="signup.css">
</head>
<body>
    <div class="signup-container">
        <h1>Create an Account</h1>
        <form method="post" action="signup_process.php">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-group">
                <label for="confirmPassword">Confirm Password</label>
                <input type="password" id="confirmPassword" name="confirmPassword" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" id="address" name="address" required>
            </div>
            <button type="submit">Sign Up</button>
        </form>
        <p>Already have an account? <a href="login_page.php">Log In</a></p>
        <div class="homebutton">
            <a href="index.html">
                    <img src="images/home.png" alt="homeicon" width="40" height="40">
            </a>
        </div>
    </div>
</body>
</html>
