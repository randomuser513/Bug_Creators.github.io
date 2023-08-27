<?php

    require_once "common.php"; 

    $errors = []; 

    $username = $_POST['username']; 
    $password = $_POST['password']; 
    
    // Create the DAO object to facilitate connection to the database.

    $dao = new UserDAO(); 
    $user = $dao -> get($username); 
    
    // Check if the username exists
    if ($user)
    {
        // If username exists
        // get the hashed password from the database
        // Match the hashed password with the one which user entered
        // if it does not match. -> error

        $hashed = $user -> getPasswordHash(); 
        $status = password_verify($password, $hashed);

        // check if the plain text password is valid
     
        if ($status){

            $_SESSION['username'] = $username; 
            header('Location: index.html'); 
            return; 
     
        }
        else
        {
            // password not valid
            // return to login page and show error

            $errors[] = 'Invalid password!'; 
            $_SESSION['errors'] = $errors; 
            $_SESSION['login_page'] = $username; 
            // create a session entry for failed attempt by user 
            header('Location:login_page.php'); 
     
        }

    } else {

        $errors[] = 'Username does not exist in the database!'; 
        $_SESSION['errors'] = $errors; 
        $_SESSION['login_page'] = $username; 
        header('Location:login_page.php'); 
        return; 

    }
?>

