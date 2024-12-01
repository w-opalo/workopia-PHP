<?php

class Database
{
    public $conn;

    /**
     * constructor for the class
     * 
     * @param arrat $config
     */

    public function __construct($config)
    {
        $dsn = "mysql:host={$config['host']};dbname={$config['dbname']}";

        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ];

        try {

            $this->conn = new PDO($dsn, $config['username'], $config['password'], $options);

            echo "conecteddddd";
        } catch (PDOException $e) {
            throw new Exception("Database connection failed: {$e->getMessage()}");
        }
    }
}
