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
    #private $tabel_name = 'shop24';

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

    function readAll(){

        //select all query TEST
        $query = "SELECT * FROM `" . $this->tabel_name . "`;";
        echo $query;
        //prepare query statement
        $stmt = $this->conn->prepare($query);

        //execute statement
        $stmt->execute();

        return $stmt;
    }

    function readID(){

        //select all query TEST
        $query = "SELECT $this->id FROM `$this->tabel_name` WHERE Oberkategorien = '$this->topcategory' 
                                                 AND KategorieEbene2 = '$this->categoryLevel2' 
                                                 AND KategorieEbene3 = '$this->categoryLevel3' 
                                                 AND KategorieEbene4 = '$this->categoryLevel4' 
                                                 AND KategorieEbene5 = '$this->categoryLevel5' 
                                                 AND KategorieEbene6 = '$this->categoryLevel6'";

        //prepare query statement
        $stmt = $this->conn->prepare($query);

        //execute statement
        $stmt->execute();

        return $stmt;
    }

    function addColumnsToCategoryTreeTable(){

    }
}
