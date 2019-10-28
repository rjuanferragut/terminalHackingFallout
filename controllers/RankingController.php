<?php
    /* @author Alexis Mengual, Rafa Juan */

    /*
    * Método para obtener un Array a partir de un archivo JSON
    * @return el array decodificado de un archivo JSON
    */
    function getArrayFromJSON(){
        $json = file_get_contents('../storage/ranking.json');
        if($json == ""){
          return array();
        }

        return json_decode($json, true);
    }

    function getIdFromArray($participants){
      $id = 1;

      if(count($participants) != 0){
        for ($i = 0; $i < count($participants); $i++){$id++;}
      }

      return $id;
    }

    function setRegister($id, $name, $tries, $time){
        return array(
          'id' => $id,
          'name' => $name,
          'tries' => $tries,
          'time' => $time
        );
    }

    function setJSONParticipants($participants){
      $order_participants = getOrderParticipants($participants, 'tries', SORT_ASC, 'time', SORT_ASC, 'name', SORT_ASC, 'id', SORT_ASC);
      $json = json_encode($order_participants, JSON_PRETTY_PRINT);
      var_dump($json);
      file_put_contents('../storage/ranking.json', $json);
    }

    function getOrderParticipants(){
      $args = func_get_args();
		    $data = array_shift($args);
		    foreach ($args as $n => $field) {
		        if (is_string($field)) {
		            $tmp = array();
		            foreach ($data as $key => $row)
		                $tmp[$key] = $row[$field];
		            $args[$n] = $tmp;
		            }
		    }
		    $args[] = &$data;
		    call_user_func_array('array_multisort', $args);
		    return array_pop($args);
    }
?>
