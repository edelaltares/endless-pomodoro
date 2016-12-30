<?php

$config = parse_ini_file("config.ini");

define("HOST", $config['server']);
define("USER", $config['username']);
define("PASS", $config['password']);
const   DB      = 'pomodoro',
        CHAR    = 'utf8',
        PORT    = '3306';

Class Database {
    // connect to database
    function connect() {
        $dsn = "mysql:host=" . HOST . ";dbname=" . DB;
        $dsn .= ";charset=" . CHAR;

        $opt = [
            PDO::ATTR_ERRMODE               => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE    => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES      => false,
        ];

        $pdo = new PDO($dsn, USER, PASS, $opt);

        return $pdo;
    }

    // run query
    function query($query, $pdo) {
        $result = $pdo->query($query);
        
        return result;
    }

}

Class User {
    public $loggedin = false;    

    function login($user, $pw, $db) {
        $query = "SELECT * FROM users WHERE username=? AND password=?";

        $result = $db->prepare($query);
        $result->execute([$user, $pw]);
        $result = $result->fetch();
        return $result;
    }
}

