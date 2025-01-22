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
    private $conn; //Variable qui va contenir la connexion à la base de données

    //Fonction pour se connecter à la base de données
    public function getConnection() {
        $this->conn = null;
        $config = require 'db_config.php'; //On récupère les informations de connexion à la base de données en les incluant depuis le fichier db_config.php
        try {
            $this->conn = new PDO("pgsql:host={$config['host']};port={$config['port']};dbname={$config['dbname']}",  $config['user'], $config['password']); //On se connecte à la base de données
            $this->conn->exec("set client_encoding to 'UTF8'");
        } catch (PDOException $exception) {
            echo "Connection error: " . $exception->getMessage();
        }
        return $this->conn; //On retourne la connexion
    }
}
?>