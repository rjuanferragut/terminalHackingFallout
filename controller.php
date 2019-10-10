<?php
/*
* @author Alexis Mengual
*/

function loadFile($array_words){
    $count = 0;
    $fp = fopen("words.txt", "r");

    while (!feof($fp) AND $count != 6){
        $linea = fgets($fp);
        $array_words[$count] = $linea;
        $count++;
    }

    fclose($fp);
    return $array_words;

}

function printArray($array_words){
    for ($i = 0; $i < count($array_words); $i++) {
        echo $array_words[$i];
    }
}

 ?>
