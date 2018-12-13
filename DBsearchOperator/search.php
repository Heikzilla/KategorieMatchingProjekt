<?php
/**
 * Created by PhpStorm.
 * User: hg
 * Date: 06.12.18
 * Time: 19:59
 */

include_once ("../config/database.php");
include_once ("../objects/categorytree.php");
class Search{

    private $tree;

    function getDBconnection(){
        $database = new Database();
        return $db = $database->getConnection();
    }

    function getCategoryTree($db){
        return $tree = new CategoryTree($db);
    }

    function getTableName($var){
        return $this->tabel_name = $var;
    }

    function getTableID($var){
        return $this->id = $var;
    }

    function getShopId($array, $tableName = 'yoho', $idColumn = 'YOHO_ID')
    {

        $this->tabel_name = $tableName;
        $this->id = $idColumn;

        return $id = $tree->readID($array);
    }

    function getPortalData($id)
    {

    }
}