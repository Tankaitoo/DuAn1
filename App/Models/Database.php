<?php

namespace App\Models;

use mysqli;
use PDO;
use PDOException;

class Database
{

    private $_host ;
    private $_username ;
    private $_password;
    private $_database;

    public function __construct()
    {
        $this->_host = $_ENV['DB_HOST'];
        $this->_username = $_ENV['DB_USERNAME'];
        $this->_password = $_ENV['DB_PASSWORD'] ;
        $this->_database = $_ENV['DB_NAME'];
    }
    // public function connect()
    // {

    //     // Create connection
    //     $conn = new mysqli($_ENV['DB_HOST'], $_ENV['DB_USERNAME'], $_ENV['DB_PASSWORD'], $_ENV['DB_NAME']);

    //     // Check connection
    //     if ($conn->connect_error) {
    //         die("Connection failed: " . $conn->connect_error);
    //     }
    //     return $conn;
    // }

    public function Pdo()
    {
        try {
            $conn = new PDO("mysql:host=$this->_host;dbname=$this->_database", $this->_username, $this->_password);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            return $conn;
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }


    public function MySQLi()
    {
        $conn = new mysqli($this->_host, $this->_username, $this->_password, $this->_database);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        return $conn;
    }
}
