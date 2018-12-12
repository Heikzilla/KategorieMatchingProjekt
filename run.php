<?php
/**
 * Created by PhpStorm.
 * User: hg
 * Date: 06.12.18
 * Time: 18:15

    public $fileName;
    public $fileSperator = ';';
    public $fileSperator;
    public $shop;
    public $portal;
*/
#include_once "FileManager/fileconverter.php";
include_once "FileManager/managecolumns.php";
#include_once "DBsearchOperator/search.php";

#$fileConverter = new FileConverter;
$manageColumns = new ManageColumns();
#$DBsearchOperator = new Search();
#$fileConverter->fileToArray($fileName, $fileSeperator);

#$manageColumns->extractColumn($array, $columnTreeName);


$array = array( "1" => "Möbel / Tische / Beistelltische / Ablagetische",
                "2" => "Haus & Garten / Renovieren & Wohnen / Bodenbeläge / Sockelleisten",
                "3" => "Haus & Garten / Renovieren & Wohnen / Bodenbeläge / Sockelleisten",
                "4" => "Haus & Garten / Renovieren & Wohnen / Tapeten / Weitere Tapeten / Papiertapeten",
                "5" => "Möbel / Kommoden & Sideboards / Kommoden / Schuhkommoden",
                "6" => "Heimtextilien / Gardinen & Vorhänge / Gardinenstangen / Gardinenstangen nach Maß",
                "7" => "Heimtextilien / Gardinen & Vorhänge / Gardinenstangen / Gardinenstangen nach Maß",
                "8" => "Heimtextilien / Gardinen & Vorhänge / Gardinenstangen / Gardinenstangen nach Maß",
                "9" => "Heimtextilien / Gardinen & Vorhänge / Gardinenstangen / Gardinenstangen nach Maß",
                "10" => "Heimtextilien / Gardinen & Vorhänge / Gardinenstangen / Gardinenstangen nach Maß"
    );
$returnVal = $manageColumns->uniqueEntrys($array);
var_dump($returnVal);

foreach($returnVal as $string){
    $result = $manageColumns->CategoryLineToArray($string);
    var_dump($result);
}


die();
$manageColumns->addColumn();
$fileConverter->arrayToFile($array, $fileName, $fileSeperator);

?>