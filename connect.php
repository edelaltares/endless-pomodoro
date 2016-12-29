<?php

session_start();

static $connection;

if(!isset($connection)) {
    $config = parse_ini_file('config.ini');
    $connection = mysql_connect($config['server'], $config['username'], $config['password']);

    include('functions.php');

}

if($connection == false) {
    echo "Could not connect to database";

    return mysqli_connect_error();
}
