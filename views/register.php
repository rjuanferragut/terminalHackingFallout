<?php
      session_start();
      require_once('layouts/header.php');
      if(isset($_POST["prompt"]) OR isset($_POST["tries"]) OR isset($_POST["game_time"])){
          require_once('../controllers/RankingController.php');
          $prompt = $_POST['prompt'];
          $_SESSION['prompt'] = $prompt;
          $tries = $_POST['tries'];
          $time = $_POST['game_time'];
          $difficulty = $_POST['difficulty'];
          $participants = getArrayFromJSON();
          $id = getIdFromArray($participants);
          $register_participant = setRegister($id, $prompt, $tries, $time, $difficulty);
          array_push($participants, $register_participant);
          setJSONParticipants($participants);
    }
?>

  <h3 style="text-align: center;">¡Tu registro se ha completado correctamente!</h3>
  <hr style="padding: 2px; background: #00F501; border: 0; margin: 15px auto;" />
  <h4 style="text-transform: uppercase; text-align: center">Nombre: <?php echo $_POST['prompt'] ?></h4>
  <h4 style="text-transform: uppercase; text-align: center">Intentos: <?php echo $_POST['tries'] ?></h4>
  <h4 style="text-transform: uppercase; text-align: center">Tiempo: <?php echo $_POST['game_time'] ?></h4>
  <br />
  <a href="terminal.php">Volver a Jugar</a>
  <a href="ranking.php">Ver Ranking</a>
  <a href="index.php">Página Principal</a>
<?php require_once('layouts/footer.php'); ?>
