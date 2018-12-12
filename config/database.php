<?php
/**
 * Created by PhpStorm.
 * User: hg
 * Date: 06.12.18
 * Time: 10:10
 */

class Database
{
    //SQL Specs Server
    private $username = "omcuser";
    private $password = "omcmat2016";
    private $host = "78.46.190.42";
    private $db_name = "kategoriebaeume";
    public $conn;

    // get Database connection
    public function getConnection(){

        $this->conn = null;

        try{
            $this->conn = new PDO("mysql:host=$this->host;dbname=$this->db_name;port=3306;charset=utf8", $this->username, $this->password);
            $this->conn->exec("set name utf8");
        }catch (PDOException $exception){
            echo "Connection error: " . $exception->getMessage();
        }

        return $this->conn;
    }
}