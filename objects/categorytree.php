<?php
/**
 * Created by PhpStorm.
 * User: Heikel
 * Date: 08.12.2018
 * Time: 18:19
 */

class CategoryTree
{

    //database connection
    private $conn;

    //DatenObjekte
    public $tabel_name;
    public $id;
    public $topcategory;
    public $categoryLevel2;
    public $categoryLevel3;
    public $categoryLevel4;
    public $categoryLevel5;
    public $categoryLevel6;
    public $cpcVal;
    public $cpcMobileVal;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    function read(){

        //select all query TEST
        $query = "SELECT * FROM `" . $tabel_name . "`;";

        //prepare query statement
        $stmt = $this->conn->prepare($query);

        //execute statement
        $stmt->execute();

        return $stmt;
    }
}