<?php

include('connect.php');

if(count($_POST) == 4) {
    $username = $_POST['new_username'];
    $password = $_POST['new_password'];
    $verifypw = $_POST['verify_password'];

    $user = new User();

    $result = $user->register($username, $password, $verifypw, $connection); 
    
    if(!$result) {
        $_SESSION['reg_failed'] = true;  
    }
    else if($result == -1) {
        $_SESSION['pw_same'] = false;
        $_SESSION['reg_failed'] = true;
    }
    else {
        $_SESSION['user'] = $username;
    }
    
}

header('Location: index.php');
