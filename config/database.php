<?php
/**
 * Created by PhpStorm.
 * User: hg
 * Date: 06.12.18
 * Time: 10:10
 */

class Database
{
    // SQL Specification
    private $host = "localhost";
    private $db_name = "KategorienBaum";
    private $username = "root";
    private $password = "";
    public $conn;

    // get Database connection
    public function getConnection(){

        $this->conn = null;

        try{
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->exec("set name utf8");
        }catch (PDOException $exception){
            echo "Connection error: " . $exception->getMessage();
        }
    }
}