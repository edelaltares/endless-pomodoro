<?php

include_once('Database.php');

Class User {
    public $loggedin = false;    

    function login($user, $pw, $db) {
        $query = "SELECT * FROM users WHERE username=?";
        $result = $db->query($query, array($user));
        $result = $result->fetch();
        
        $pass = md5($pw .  $result['salt']);
        
        return($pass==$result['password']);
    }
}

