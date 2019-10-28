<?php require_once('layouts/header.php'); ?>
  <img src="public/img/register.png" alt="" style="width: 30%; display: block; margin: 10px auto;">
  <h3 style="text-align: center;">¡Tu registro se ha completado correctamente!</h3>
  <hr style="padding: 2px; background: #00F501; border: 0; margin: 15px auto;" />
  <h4 style="text-transform: uppercase; text-align: center">Nombre: <?php echo $_POST['prompt'] ?></h4>
  <h4 style="text-transform: uppercase; text-align: center">Intentos: <?php echo $_POST['tries'] ?></h4>
  <h4 style="text-transform: uppercase; text-align: center">Tiempo: <?php echo $_POST['game_time'] ?></h4>
  <br />
  <a href="terminal">Volver a Jugar</a>
  <a href="ranking">Ver Ranking</a>
  <a href="index">Página Principal</a>
<?php require_once('layouts/footer.php'); ?>
