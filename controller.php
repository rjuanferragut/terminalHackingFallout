<?php
/*
* @author Alexis Mengual, Rafa Juan
*/

/*
* Método que hace la lectura del archivo y recoge el contenido
* @return un array con todas las palabras del archivo
*/
function loadFile($array){
    $count = 0;
    $fileOpen = fopen("words.txt", "r");

    while (!feof($fileOpen)){
        $linea = fgets($fileOpen);
        $array[$count] = $linea;
        $count++;
    }

    fclose($fileOpen);
    return $array;

}

/*
* Método que selecciona de manera aleatoria 6 palabras
* del Array que le pasamos.
* @return pasamos un nuevo array con 6 palabras aleatorias.
*/
function selectRandomWords($array){
    $select = array();

    for ($i = 0; $i < 6; $i++) {
        $random = rand(0, 19);
        $select[$i] = $array[$random];
    }

    return $select;
}

/*
* Método para ver el contenido del array con las
* palabras seleccionadas del archivo
*/
function printArray($array_words){
    for ($i = 0; $i < count($array_words); $i++) {
        echo $array_words[$i] . "<br>";
    }
}

 ?>
