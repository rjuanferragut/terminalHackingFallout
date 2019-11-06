<?php
      session_start();
      require_once('layouts/header.php');
      if(isset($_POST["prompt"]) AND isset($_POST["tries"]) AND isset($_POST["game_time"]) AND isset($_POST["difficult"]) AND isset($_POST["difficult_value"])){
          require_once('../controllers/RankingController.php');
          $prompt = $_POST['prompt'];
          $tries = $_POST['tries'];
          $time = $_POST['game_time'];
          $difficulty = $_POST['difficult'];
          $difficulty_value = $_POST['difficult_value'];

          $participants = getArrayFromJSON();
          $id = getIdFromArray($participants);
          $register_participant = setRegister($id, $prompt, $tries, $time, $difficulty, $difficulty_value);

          array_push($participants, $register_participant);
          setJSONParticipants($participants);

          // Guardamos la coockie;
          $_SESSION['prompt'] = $prompt;
          $_SESSION['string'] = $stringSession;
          //$_SESSION['lives'] = $livesSession;
    }else{
      echo "Error";
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
