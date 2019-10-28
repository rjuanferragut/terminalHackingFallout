<?php
    /* @author Alexis Mengual, Rafa Juan */

    /*
    * Método para obtener un Array a partir de un archivo JSON
    * @return el array decodificado de un archivo JSON
    */
    function getArrayFromJSON(){
        $json = file_get_contents(dirname(__FILE__).'/storage/ranking.json');
        return json_decode($json, true);
    }

?>
