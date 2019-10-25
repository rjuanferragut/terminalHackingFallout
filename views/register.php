<?php
    require_once('header.php');
 ?>

 <div class="container">
    <img src="../img/register.png" alt="" style="width: 30%; display: block; margin: 10px auto;">
    <h3 style="text-align: center;">¡Tu registro se ha completado correctamente!</h3>
    <hr style="padding: 2px; background: #00F501; border: 0; margin: 15px auto;" />
    <h4 style="text-transform: uppercase; text-align: center">Nombre: <?php echo $_POST['prompt'] ?></h4>
    <h4 style="text-transform: uppercase; text-align: center">Intentos: <?php echo $_POST['tries'] ?></h4>
    <h4 style="text-transform: uppercase; text-align: center">Tiempo: <?php echo $_POST['game_time'] ?></h4>
    <br />
    <a href="terminal.php">Volver a Jugar</a>
    <a href="ranking.php">Ver Ranking</a>
    <a href="../index.php">Página Principal</a>
 </div>
