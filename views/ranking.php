<?php
    require_once('header.php');
 ?>
<div class="container">
  <table style="width: 100%; table-layout: fixed; overflow-wrap: break-word">
    <thead>
      <th scope="col" style="padding: 10px; text-align: center; border-bottom: 1px solid green">#</th>
      <th scope="col" style="padding: 10px; text-align: center; border-bottom: 1px solid green">Nombre</th>
      <th scope="col" style="padding: 10px; text-align: center; border-bottom: 1px solid green">Intentos</th>
      <th scope="col" style="padding: 10px; text-align: center; border-bottom: 1px solid green">Tiempo</th>
    </thead>
    <tbody>
      <?php
      $participants = getArrayFromJson();

      for ($i=0; $i < count($participants); $i++) {
        echo '<tr>';

        echo '<td style="padding: 10px; text-align: center">' . ($i + 1) . '</td>';
        echo '<td style="padding: 10px; text-align: center">' . $participants[$i]['name'] . '</td>';
        echo '<td style="padding: 10px; text-align: center">' . $participants[$i]['tries'] . '</td>';
        echo '<td style="padding: 10px; text-align: center">' . $participants[$i]['time'] . '</td>';

        echo '</tr>';
      }

      function getArrayFromJson(){
        $json = file_get_contents('../storage/ranking.json');
        return json_decode($json, true);
      }

      ?>
    </tbody>
  </table>
</div>
