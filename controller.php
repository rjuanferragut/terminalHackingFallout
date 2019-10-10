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
    $count = 0;

    while($count != 6){
        $random = rand(0, 19);
        if(!existInArray($select, $array[$random])){
          $select[$count] = $array[$random];
          $count++;
        }
    }

    return $select;
}


/*
* Método que comprueba si la palabra ya está añadida en el array
* @return un boolean que indica si lo ha encontrado o no.
*/
function existInArray($array, $word){
    for ($i = 0; $i < count($array); $i++) {
        if($array[$i] == $word){
            return true;
        }
    }

    return false;
}

/*
* Método para ver el contenido del array con las
* palabras seleccionadas del archivo
*/
function printArray($array_words){
    for ($i = 0; $i < count($array_words); $i++) {
        echo $array_words[$i] . "<br />";
    }
}


function generateString(){
    $symbols = ".,='+-$<>(){}[]$@:%#?!/|*";
    $string = "";
    for ($i = 0; $i < 16; $i++) {
        $random = rand(0, strlen($symbols));
        echo $symbols[$random] . "<br />";
    }

    return $string;
}
 ?>
