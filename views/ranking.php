<?php
require_once('layouts/header.php');
require_once('../controllers/RankingController.php');
$participants = getArrayFromJSON();
?>

<style type="text/css">
table{
  width:100%;
  table-layout: fixed;
  overflow-wrap: break-word;
  text-align: center;
  text-transform: uppercase;
}
</style>

<table>
  <thead>
    <th scope="col">#</th>
    <th scope="col">Nombre</th>
    <th scope="col">Intentos</th>
    <th scope="col">Tiempo</th>
    <th scope="col">Dificultad</th>
  </thead>
  <tbody>
    <?php
    for ($i = 0; $i < count($participants); $i++) {
      echo '<tr>';
      echo '<td>'.($i + 1).'</td>';
      echo '<td>'.$participants[$i]['name'].'</td>';
      echo '<td>'.$participants[$i]['tries'].'</td>';
      echo '<td>'.$participants[$i]['time'].'</td>';
      echo '<td>'.$participants[$i]['difficulty'].'</td>';
      echo '</tr>';
    }
    ?>
  </tbody>
</table>
<div id="rankButtons" style="margin: 25% auto;">
  <a href="terminal.php">Volver a Jugar</a>
  <a href="ranking.php">Ver Ranking</a>
  <a href="index.php">Página Principal</a>
</div>
<?php require_once('layouts/footer.php'); ?>
