<?php

include_once('Database.php');

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

