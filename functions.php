<?php
include_once('Database.php');

Class User {
    public $loggedin = false;    

    public function login($user, $pw, $db) {
        $query = "SELECT * FROM users WHERE username=?";
        $result = $db->query($query, array($user));
        $result = $result->fetch();
        
        $pass = md5($pw .  $result['salt']);
        
        return($pass==$result['password']);
    }
    
    public function register($user, $pw1, $pw2, $db) {
        if($pw1 == $pw2) {
            $salt = bin2hex(random_bytes(5));

            $pass = md5($pw1 . $salt);

            $query = "INSERT INTO users VALUES(?,?,?)";
            $result = $db->query($query, array($user, $pass, $salt));
            
            return $result; 
        }
        return false; 
    }
}

Class Pomo {
    private $user;
    private $date;
    private $time;
    private $tags;    
    private $id;

    public function __construct($info, $db) {
        $this->user = $info['user'];
        $this->date = $info['date'];
        $this->time = $info['time'];
        $this->tags = $info['tags'];
    }

    public function submit() {
        $query = "INSERT INTO pomos (date, time, user) VALUES (?,?,?)";
        $result = $db->query($query, array($this->date, $this->time, $this->user));
        
        if(!$result) {
            return false;
        }       
        else {
            $this->id = $db->pdo->lastInsertId();            

            $tag_result = $this->submitTag();
            
            return $tag_result;
        }
    }
        
    public function submitTag() {
        foreach($tag in $this->tags) {
            // check if tag exists
            $id = $this->getTagId($tag);

            if(!$id) {
                // add tag
                $result = addTag($tag);
                $id = 
            }
            
            // add relationship
            $query = "INSERT INTO tag_rels VALUES (?, ?)"l
            $result = $db->query($query, array($id, $this->id);
        }
    }
}
