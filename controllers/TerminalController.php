<?php
    /* @author Alexis Mengual, Rafa Juan */

    define('SYMBOLS', ".,='+-$!(){}[]$@:%#?/|");
    $GLOBALS['word_length'] = 0;

    /*
    * Método para actualizar el valor de $GLOBALS['word_length']
    * @param El valor que se usará para determinal el tamaño máximo de las letras.
    */
    function setwordLength($value){
      $GLOBALS['word_length'] = $value;
    }

    /*
    * Método que lee el archivo que le indicamos y lo carga en un array.
    * @param Le pasamos el nombre del fichero que necesitamos.
    * @return el array con todas las palabras del fichero.
    */
    function loadFile($filename){
        $array = array();
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

    function getHelpsAvailables($helps_available){
        $array = array();
        for ($i = 0; $i < $helps_available; $i++) {
            $content_help_length = rand(2, 10);
            $string = "1";
            for ($j = 0; $j < $content_help_length; $j++) {
                $random = rand(0, (strlen(SYMBOLS) - 1));
                $string = $string . SYMBOLS[$random];
            }

            $string = $string . "1";
            array_push($array, $string);
        }

        return $array;
    }

    function generateSymbolsString(){
        $string = "";
        for ($i = 0; $i < 16; $i++) {
            for ($j = 0; $j < 24; $j++) {
                $random = rand(0, (strlen(SYMBOLS) - 1));
                $string = $string . SYMBOLS[$random];
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

    // function setHelps($string, $array_helps){
    //     $max_length_string = strlen($string);
    //     $i = 0;
    //
    //     while($i < count($array_helps)){
    //         $current_help = $array_helps[$i];
    //         $initString = rand(0, $max_length_string - strlen($current_help));
    //         $lastString = $initString + strlen($current_help);
    //
    //         if(!hasLetter($string, $initString, $lastString)){
    //           $pos = 0;
    //             for ($j = $initString; $j < $lastString; $j++) {
    //                 $string[$j] = $current_help[$pos];
    //                 $pos = $pos + 1;
    //             }
    //         $i++;
    //         }
    //     }
    //
    //     return $string;
    // }

    /*
    * Método para revisar si encuentra una letra del alfabeto
    * antes de añadir una palabra en el string.
    */
    function hasLetter($string, $init, $last){
        // Si la posición es mayor que 0, compruebo que la posición
        // anterior al inicio no sea un caracter.
        if($init > 0){
            $before = $init - 2;

            if(ctype_alpha($string[$before])){
                return true;
            }
        }

        // Compruebo si la posición de después contiene una letra.
        $after = $last + 2;
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

    // function getTerminalCode(){
    //   for($i = 0; $i <= 32;$i++){
    //
    //   }
    //   return
    // }

 ?>
