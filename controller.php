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


    function generateSymbolsString(){
        $symbols = ".,='+-$<>(){}[]$@:%#?!/|*";
        $string = "";
        for ($i = 0; $i < 16; $i++) {
            for ($j = 0; $j < 24; $j++) {
                $random = rand(0, (strlen($symbols) - 1));
                $string = $string . $symbols[$random];
            }
        }

        return $string;
    }

    function setWords($array, $string){
        $max_length_string = strlen($string);

        $i = 0;
        while($i != 6){
            $word = $array[$i];
            $positionString = rand(0, ($max_length_string) - 6);

            if(!hasLetter($string, $positionString)){
                $pos = 0;
                for ($j = $positionString; $j < ($positionString + 5); $j++) {
                    $string[$j] = $word[$pos];
                    echo "<span style='color: yellow'>" . $word[$pos] . "</span>";
                    $pos++;
                }

                echo "<br />";

                $i++;
            }
        }

        echo $string . "<br />";
    }

    function hasLetter($string, $pos){
        for ($i = $pos; $i < ($pos + 5); $i++) {
            if(ctype_alpha($string[$i])){
                return true;
            }
        }

        return false;
    }

 ?>
