<?php
/**
 * Created by PhpStorm.
 * User: hg
 * Date: 06.12.18
 * Time: 18:14
 */

class ManageColumns
{

    function extractColumn($array, $columnTreeName){
        $tempArr = array();
        foreach($array as $lineNum => $rows){
            $tempArr[] = $array[$lineNum][$columnTreeName];
        }
        return $tempArr;
    }

    function uniqueEntrys($array){
        return $result = array_unique($array);
    }

    function addColumn($array, $array2){

        $array2;

        foreach ($array as $lineNum => $row){
            $row[$lineNum] = array_merge($row[$lineNum], array(

            ));
        }
    }

    function CategoryLineToArray($string){
        /**
         * Makes out of an textline like
         * string(82) "Heimtextilien / Gardinen & Vorhänge / Gardinenstangen / Gardinenstangen nach Maß"
         * an array which contains 6 Positions by default.
         * This cam be later used for Database requests
         */
        $pattern = "/([a-zA-Zöäü & ÖÄßÜ]+)\b/mu";
        var_dump($string);
        preg_match_all($pattern, $string, $resultRegEx);

        $result = array(1 => '',2 => '',3 => '',4 => '',5 => '',6 => '');
        $y = 1;
        for($i = 0; $i < count($resultRegEx[1]); $i++){
            $result[$y] = trim($resultRegEx[1][$i]);
            $y++;
        }

        if(is_array($result)){
            return $result;
        }else {
            return false;
        }
    }
}