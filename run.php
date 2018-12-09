<?php
/**
 * Created by PhpStorm.
 * User: hg
 * Date: 06.12.18
 * Time: 18:15
 */
    public $fileName;
    public $fileSperator = ';';
    public $fileSperator;
    public $shop;
    public $portal;

include_once('../FileManager/fileconverter.php');
include_once('../FileManager/managecolumns.php');


$fileConverter = new FileConverter;
$manageColumns = new ManageColumns;

$fileConverter->fileToArray($fileName, $fileSeperator);

$manageColumns->extractColumn($array, $columnTreeName);
$manageColumns->uniqueEntrys($array);




$manageColumns->addColumn();
$fileConverter->arrayToFile($array, $fileName, $fileSeperator);