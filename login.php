<?php
ini_set('display_errors',1);

include('connect.php');

if(isset($_POST['username']) and isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    $user = new User();

    $result = $user->login($username, $password, $connection); 
    
    if($result) { 
        $_SESSION['user'] = $username;
    }
    else {
        $_SESSION['failed'] = true;
    }
    
    header('Location: index.php');
}

