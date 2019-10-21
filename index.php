<!DOCTYPE html>
  <html lang="es">
      <head>
        <meta charset="utf-8">
        <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0,minimum-scale=1.0,target-densitydpi=device-dpi, width=device-width, user-scalable=no">

        <title>Terminal Fallout</title>

        <link rel="stylesheet" type="text/css" href="css/app.css">
        <link href="https://fonts.googleapis.com/css?family=Share+Tech+Mono&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css" integrity="sha384-KA6wR/X5RY4zFAHpv/CnoG2UW1uogYfdnP67Uv7eULvTveboZJg0qUpmJZb5VqzN" crossorigin="anonymous">
        <script src="js/script.js"></script>
        <script src="js/printer.js"></script>
        <script src="js/timer.js"></script>
        <?php
          require_once('controller.php');
          $array_words = array();
          $array_select_words = array();

          $array_words = loadFile($array_words);
          $array_select_words = selectRandomWords($array_words);

          $string = generateSymbolsString();
          $string = setWords($array_select_words, $string);

          //array de los codigos hexadecimales ORDENADO POR LINEAS EN HORIZONTAL
          $array_hexadecimal = array('0x7400','0x74C0','0X740C','0x74CC','0x7418','0x74D0','0x7424','0x74E4','0x7430','0x74F0','0x743C','0x74FC','0x7448','0x7500','0x7454','0x7514','0x7460','0x7520','0x746C','0x752C','0x7478','0x7530','0x7484','0x7544','0x7490','0x7550','0x749C','0x755C','0x74A8','0x7560','0x74B4','0x7574');
          $password = getPassword($array_select_words);
        ?>
      </head>
      <body>
          <?php require_once('views/terminal.php') ?>
      </body>
  </html>
