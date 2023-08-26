<?php 

    require_once "common.php"; 
    $username = ''; 

    if (isset($_SESSION['login_page'])){ 
        $username = $_SESSION['login_page']; 
        unset($_SESSION['login_page']); 
    }

?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="login_css.css">
</head>
<body>

    <div class="login-container">
        <h1>Login</h1>
        <form method="post" action="login.php">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit">Login</button>
        </form>
        <p>Don't have an account? <a href="signup.php">Sign Up</a></p>

        <div class="homebutton">
        <a href="index.html">
                <img src="images/home.png" alt="homeicon" width="40" height="40">
        </a>
        </div> 

        <?php
        printErrors(); 
        ?>
    </div>

</body>
</html>
