<?php
    /* @author Alexis Mengual, Rafa Juan */

    /*
    * Método que hace la lectura del archivo y recoge el contenido
    * @return un array con todas las palabras del archivo
    */
    $GLOBALS['word_length'] = 0;

    function setwordLength($value){
      $GLOBALS['word_length'] = $value;
    }

    function loadFile($array, $filename){
        $count = 0;
        $fileOpen = fopen("../storage/".$filename, "r");

        while (!feof($fileOpen)){
            $linea = fgets($fileOpen);
            $array[$count] = $linea;
            $count++;
        }

        fclose($fileOpen);
        return $array;

    }

    /*
    * Método que selecciona de manera aleatoria X palabras
    * del Array que le pasamos.
    * @return pasamos un nuevo array con X palabras aleatorias.
    */
    function selectRandomWords($array, $total_words){
        $select = array();
        $count = 0;

        while($count != $total_words){
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
        // Se han quitado los símbolos <> porque dan problemas al pasar el string *e imprimirlo
        $symbols = ".,='+-$!(){}[]$@:%#?/|";
        $string = "";
        for ($i = 0; $i < 16; $i++) {
            for ($j = 0; $j < 24; $j++) {
                $random = rand(0, (strlen($symbols) - 1));
                $string = $string . $symbols[$random];
            }
        }
        return $string;
    }

    /*
    * Método que añade las palabras en posiciones random del String.
    */
    function setWords($array, $string, $total_words){
        $max_length_string = strlen($string);
        $i = 0;

        while($i < $total_words){
            $word = $array[$i];
            $initString = rand(0, ($max_length_string) - ($total_words + 1));
            $lastString = $initString + $GLOBALS['word_length'];

            if(!hasLetter($string, $initString, $lastString)){
                $pos = 0;

                try{
                    for ($j = $initString; $j < $lastString; $j++) {
                        $string[$j] = $word[$pos];
                        $pos = $pos + 1;
                    }
                }catch(Exception $e){
                  echo "Posición de j: " . $j . "\nLetra de j:" . $string[$j];
                }


                $i++;
            }
        }

        return $string;
    }

    /*
    * Método para revisar si encuentra una letra del alfabeto
    * antes de añadir una palabra en el string.
    */
    function hasLetter($string, $init, $last){
        // Si la posición es mayor que 0, compruebo que la posición
        // anterior al inicio no sea un caracter.
        if($init > 0){
            $before = $init - 1;

            if(ctype_alpha($string[$before])){
                return true;
            }
        }

        // Compruebo si la posición de después contiene una letra.
        $after = $last + 1;
        if($after < 384){
          if(ctype_alpha($string[$after])){
            return true;
          }
        }

        for ($i = $init; $i <= $last; $i++) {
            if(ctype_alpha($string[$i])){
              return true;
            }
        }

        return false;
    }

    /*
    * Método del cuál obtengo una palabra para usarla como
    * contraseña.
    */
    function getPassword($array){
        return $array[rand(0, (count($array) - 1))];
    }

 ?>
