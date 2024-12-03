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
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            // PDO::ATTR_DEFAULT_FETCH_MODE => pdo::FETCH_ASSOC,
            PDO::ATTR_DEFAULT_FETCH_MODE => pdo::FETCH_OBJ
        ];

        try {

            $this->conn = new PDO($dsn, $config['username'], $config['password'], $options);
        } catch (PDOException $e) {
            throw new Exception("Database connection failed: {$e->getMessage()}");
        }
    }

    /**
     * Query the database
     * @param string $query
     * 
     * @return PDOStatment
     * @throws PDOException
     * 
     */
    public function query($query, $params = [])
    {
        try {
            $sth = $this->conn->prepare($query);

            // Bind named params
            foreach ($params as $param => $value) {
                $sth->bindValue(':' . $param, $value);
            }

            $sth->execute();
            return $sth;
        } catch (PDOException $e) {
            throw new Exception("Query failed to execute: {$e->getMessage()}");
        }
    }
}
