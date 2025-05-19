<?php

require_once "config.php";

class Database {
    private static $instance = null;
    private $conn;
    private $username;
    private $password;
    private $host;
    private $database;

    private function __construct() {
        $this->username = USERNAME;
        $this->password = PASSWORD;
        $this->host = HOST;
        $this->database = DATABASE;
    }

    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new Database();
        }
        return self::$instance;
    }

    public function connect() {
        try {
            $this->conn = new PDO(
                "pgsql:host=$this->host;port=5432;dbname=$this->database",
                $this->username,
                $this->password,
            );

            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $this->conn;
        }
        catch(PDOException $e) {
            $object = new DefaultController();
            $object->notFound();
        }
    }

    public function disconnect()
    {
        $this->conn = null;
    }
}