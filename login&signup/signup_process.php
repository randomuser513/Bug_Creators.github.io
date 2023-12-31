<?php
require_once "common.php";

    $errors = [];

    // Get the data from form processing

    

    $username = $_POST['username']; 
    if(strlen($username) == 0){ 
        $errors[] ='Name cannot be empty nor blank!'; 
    }

    $password = $_POST['password']; 
    if (strlen($password) == 0){ 
        $errors[] = 'Password cannot be empty nor blank!'; 
    }

    $confirmPassword = $_POST['confirmPassword']; 
    if ($confirmPassword != $password){ 
        $errors[] = 'Passwords are different!'; 
    }

    // Check if username is already taken

    if (strlen($username) != 0){ 
        // if username is entered 

        $dao = new UserDAO(); 
        $user = $dao -> get($username); 
        if ($user){ 
            $errors[] = 'Username is already taken!'; 
        }

    }

    $email = $_POST['email']; 
    if (strlen($email) == 0){ 
        $errors[] = "Email cannot be empty nor blank!"; 
    }
    $address = $_POST['address']; 
    if (strlen($address) == 0 ){ 
        $errors[] ="Address cannot be empty nor blank"; 
    }

    // If one or more fields have validation error

    $count = count($errors); 

    if ($count > 0){ 
        $_SESSION['errors'] = $errors; 
        $_SESSION['fail'] = $username; 
        header('Location:signup.php');
        return; 
    }

    // if everything is checked. Create user Object and write to database
    
    $password_hash = password_hash($password, PASSWORD_DEFAULT); 
    $userobj = new User($username, $password_hash, $password, $email, $address);
    $userDAO = new UserDAO(); 
    $status = $userDAO -> create($userobj);  


if ( $status ) {
    // success; redirect page
    $_SESSION["login_page"] = $username;
    header("Location: login_page.php");
    exit();
} else { 
    $_SESSION['fail'] = $username; 
    echo "Error in registration";
    header('Location:signup.php');  
}
    
?>