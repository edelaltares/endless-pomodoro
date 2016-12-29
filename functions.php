<?php

Class Config {
    $config = parse_ini_file('config.ini');
    const   HOST    = $config['server'],
            DB      = 'pomodoro',
            USER    = $config['username'],
            PASS    = $config['password'],
            CHAR    = 'utf8',
            PORT    = '3306';
}

Class Database {
    // connect to database
    function connect() {
        $dsn = "mysql:host" . Config::HOST . ";dbname=" . Config:DB;
        $dsn .= ";charset=" . Config::CHAR;

        $opt = [
            PDO::ATTR_ERRMODE               => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE    => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES      => false,
        ];

        $pdo = new PDO($dsn, Config::USER, Config::PASS, $opt);

        return $pdo;
    }

    // run query
    function query($query, $pdo) {
        $result = $pdo->query($query);
        
        return result;
    }

}

Class User {
    function login($user, $pw, $db) {
        $query = "SELECT * FROM users WHERE user=? AND password=?";

        $result = $db->prepare($query);
        $result->execute([$user, $pw]);
        $result = $result->fetch();
        return $result;
}
