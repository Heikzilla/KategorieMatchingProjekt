<?php
/**
 * Created by PhpStorm.
 * User: hg
 * Date: 06.12.18
 * Time: 19:59
 */
include_once(dirname(__DIR__)."/objects/categorytree.php");
class Search extends CategoryTree
{

    function getShopId($array, $tableName = 'yoho', $idColumn = 'YOHO_ID')
    {
        $this->tabel_name = $tableName;
        $this->id = $idColumn;

        return $id = $this->readID($array);
    }

    function getPortalData($id)
    {

    }
}