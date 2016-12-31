<?php

session_start();

static $connection;

if(!isset($connection)) {
    include('functions.php');
    $db = new Database();
    $connection = $db->connect('config.ini');
}

if($connection == false) {
    echo "Could not connect to database";

    return mysqli_connect_error();
}
