<?php

session_start();

static $connection;

if(!isset($connection)) {
    include('functions.php');
    $db = new Database();
    $connection = $db->connect();
}

if($connection == false) {
    echo "Could not connect to database";

    return mysqli_connect_error();
}
