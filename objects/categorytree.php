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
    private $topcategory;
    private $categoryLevel2;
    private $categoryLevel3;
    private $categoryLevel4;
    private $categoryLevel5;
    private $categoryLevel6;
    #private $tabel_name = 'shop24';

    //DatenObjekte
    public $tabel_name;
    public $id;
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

    function readID($array, $tableName = 'yoho', $idColumn = 'YOHO_ID'){
        $this->tabel_name = $tableName;
        $this->id = $idColumn;

        //select all query TEST
       /* $query = "SELECT $this->id FROM `$this->tabel_name` WHERE Oberkategorien = '$this->topcategory'
                                                 AND KategorieEbene2 = '$this->categoryLevel2' 
                                                 AND KategorieEbene3 = '$this->categoryLevel3' 
                                                 AND KategorieEbene4 = '$this->categoryLevel4' 
                                                 AND KategorieEbene5 = '$this->categoryLevel5' 
                                                 AND KategorieEbene6 = '$this->categoryLevel6'";*/

        $query = "SELECT $this->id FROM `$this->tabel_name` WHERE Oberkategorien = '$array[0]' 
                                                                 AND KategorieEbene2 = '$array[1]' 
                                                                 AND KategorieEbene3 = '$array[2]' 
                                                                 AND KategorieEbene4 = '$array[3]' 
                                                                 AND KategorieEbene5 = '$array[4]' 
                                                                 AND KategorieEbene6 = '$array[5]'";
        //prepare query statement
        $stmt = $this->conn->prepare($query);

        //execute statement
        $stmt->execute();

        return $stmt;
    }

    #function addColumnsToCategoryTreeTable(){



    }
}
