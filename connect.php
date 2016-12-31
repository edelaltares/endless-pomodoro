<?php

session_start();

static $connection;

if(!isset($connection)) {
    include('functions.php');
    $db = new Database();
    $db->connect('config.ini');
    $connection = $db;
}

if($connection == false) {
    echo "Could not connect to database";

    return mysqli_connect_error();
}
