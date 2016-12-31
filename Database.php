<?php 

Class Database {
    public $pdo = 0;

    public function __construct() {
    }

    public function connect($config_file) {
        $config = parse_ini_file($config_file);
        
        $host = $config['server'];
        $user = $config['username'];
        $pass = $config['password'];
        $char = $config['charset'];
        $port = $config['port'];
        $data = $config['database'];
        
        $dsn = "mysql:host=" . $host . ";dbname=" . $data . ";charset=" . $char;

        $opt = [
            PDO::ATTR_ERRMODE               => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE    => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES      => false,
        ];

        $this->pdo = new PDO($dsn, $user, $pass, $opt);

        return $this->pdo;
    }

    // run query
    public function query($query, $variables) {
        $result = $this->pdo->prepare($query);
        
        $result->execute($variables);

        return $result;
    }

}
