<?php
/**
 * Created by PhpStorm.
 * User: hg
 * Date: 06.12.18
 * Time: 18:13
 */

class FileConverter
{

    //Read File in to a multidimensional Array. where Array_Key is Column Name
    function fileToArray($filename = '', $delimiter = ',', $encloser = '"', $encodeToUtf8 = false, $fromEncoding = 'iso-8859-1') {
        if (! file_exists($filename) || ! is_readable($filename)) {
            return FALSE;
        }

        $header = NULL;
        $data = array ();
        if (($handle = fopen($filename, 'r')) !== FALSE) {
            while ( ($buffer = fgets($handle)) !== false ) {
                if ($encodeToUtf8) {
                    $buffer = mb_convert_encoding($buffer, 'UTF-8', $fromEncoding);
                }

                $row = str_getcsv($buffer, $delimiter, $encloser);

                if (! $header) {
                    $header = $row;
                } else {
                    if (count($header) == count($row)) {
                        $data[] = array_combine($header, $row);
                    } else {
                        echo "WARNING: Row length does not match header at #" . count($data);
                    }
                }

                 if (count($data) % 1000 == 0) {
                    echo "CSV wird eingelesen an Position " . count($data);
                 }
            }

            fclose($handle);

        }
        return $data;
    }

    //create a new csv File ot of a Array
    function arrayToFile($array, $filename, $header_row = true, $col_sep = "\t", $row_sep = "\n", $qut = '', $targetEncoding = 'UTF-8') {

        if (! is_array($array) or ! is_array($array[0])) {
            return false;
        }

        if ($header_row) {
            $output="";
            foreach ( $array[0] as $key => $val ) {
                // fixing encoding
                if ($targetEncoding != 'UTF-8') {
                    $key = mb_convert_encoding($key, $targetEncoding, 'UTF-8');
                }

                // Escaping quotes.
                $key = str_replace($qut, "$qut$qut", $key);
                $output .= "$col_sep$qut$key$qut";
            }
            $output = substr($output, 1) . "\n";
        }

        if (! $fpw = fopen($filename, "w")) {
            echo 'Konnte die Datei ' . $filename . ' nicht öffnen!';
        } else {
            fputs($fpw, $output);
        }

        // Data rows.
        foreach ( $array as $key => $val ) {
            $tmp = '';
            // echo ">> " . var_dump($val) . "\n";
            foreach ( $val as $cell_key => $cell_val ) {
                // fixing encoding
                if ($targetEncoding != 'UTF-8') {
                    $cell_val = mb_convert_encoding($cell_val, $targetEncoding, 'UTF-8');
                }

                // Escaping quotes.
                $cell_val = str_replace($qut, "$qut$qut", $cell_val);
                $tmp .= "$col_sep$qut$cell_val$qut";
            }

            $output = substr($tmp, 1) . $row_sep;
            fputs($fpw, $output);
            if ($key % 1000 == 0) {
                echo "CSV wird erstellt an Position " . $key;
            }
        }
        return true;
    }

}