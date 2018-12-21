<?php
/**
 * Created by PhpStorm.
 * User: Heikel
 * Date: 08.12.2018
 * Time: 18:19
 */
include_once(dirname(__DIR__)."/config/database.php");
//Old Path that works out but is not dynamic for later.
#require_once ("/home/hg/PhpstormProjects/KategorieMatchingProjekt/config/database.php");
class CategoryTree extends Database
{

    //database connection
    public $conn;
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

    public function __construct()
    {
        $this->conn = $this->getConnection();
    }

    function readAll(){

        //select all query TEST
        $query = "SELECT * FROM `$this->tabel_name`;";
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


        $textmodul = '';
        for($i = 2; count($array) <= $i; $i++){

            $textmodul = $textmodul . " AND KategorieEbene$i = '$array[$i]'";
        }
        $textmodul = $textmodul . ";";

        var_dump($textmodul);
        $query = "SELECT $this->id FROM $this->tabel_name WHERE Oberkategorien = '$array[1]'" . $textmodul;
        //prepare query statement
        $stmt = $this->conn->prepare($query);

        //execute statement
        $stmt->execute();

        return $stmt;
    }

    function tableExists($shop){

        $query = "SELECT count(*) FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_NAME = '$shop'";

        //prepare query statement
        $stmt = $this->conn->prepare($query);

        //execute statement
        $stmt->execute();

        //convert return value in to a Array to get a integer
        $value = $stmt->fetch();

        //Set status
        $status = false;
        if ($value[0] == 1){
            $status = true;
        }else#if ($value[0] == 0)
        {
            die("Sorry, there is no Table which contains $shop.\n");
        }

        return $status;
    }

    function addColumnsToCategoryTreeTable(){ return "Connection works. \n";}

}
