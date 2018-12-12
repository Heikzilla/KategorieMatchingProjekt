<?php
/**
 * Created by PhpStorm.
 * User: hg
 * Date: 06.12.18
 * Time: 19:59
 */

include_once("../config/database.php");
include_once("../objects/categorytree.php");

$database = new Database();
$db = $database->getConnection();

$tree = new CategoryTree($db);
$tree->tabel_name = 'yoho';
$tree->id = 'YOHO_ID';
$tree->topcategory;



    function getShopId($array){


        $pattern = '/([a-zA-ZöäüÖÄÜß & ]+)\s*\W\s*/';
        #preg_match_all();


        #$tree->readID();
    }

    function getPortalData($id){

    }
