<?php

/**
 * Database configuration
 * 
 * PHP version 7.4
 * 
 * @author heloise
 * @package config
 * @date 2021-01-22
 * @version 1.00
 * Last revision 2021-01-22

 */

// Database configuration

class Database {
    private $conn;

    public function getConnection() {
        $this->conn = null;
        $config = require 'db_config.php';
        try {
            $this->conn = new PDO("pgsql:host={$config['host']};port={$config['port']};dbname={$config['dbname']}",  $config['user'], $config['password']);
            $this->conn->exec("set client_encoding to 'UTF8'");
        } catch (PDOException $exception) {
            echo "Connection error: " . $exception->getMessage();
        }
        return $this->conn;
    }
}
?>