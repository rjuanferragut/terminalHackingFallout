 <!DOCTYPE html>
 <html>
 <head>
 	<title>fallout terminal</title>
 	 <link rel="stylesheet" media="all" type="text/css" href="css/stylesheet.css">
 	 <link href="https://fonts.googleapis.com/css?family=Share+Tech+Mono&display=swap" rel="stylesheet">
 	 <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0,minimum-scale=1.0,target-densitydpi=device-dpi, width=device-width, user-scalable=no">
 	  <script src="js/script.js"></script>

 	<?php

		require_once('controller.php');

		$array_words = array();
		$array_select_words = array();

		$array_words = loadFile($array_words);
		// printArray($array_words);

		$array_select_words = selectRandomWords($array_words);
		// printArray($array_select_words);

		$string = generateSymbolsString();
		// echo $string . "<br />" . strlen($string);

		$string = setWords($array_select_words, $string);

		$array_hexadecimal = array('0x7400','0x74C0','0X740C','0x74CC','0x7418','0x74D0','0x7424','0x74E4','0x7430','0x74F0','0x743C','0x74FC','0x7448','0x7500','0x7454','0x7514','0x7460','0x7520','0x746C','0x752C','0x7478','0x7530','0x7484','0x7544','0x7490','0x7550','0x749C','0x755C','0x74A8','0x7560','0x74B4','0x7574');
		//array de los codigos hexadecimales ORDENADO POR LINEAS EN HORIZONTAL
    // printArray($array_select_words);
    $password = getPassword($array_select_words);

 	?>

 </head>
 <body>
 <div id="container">
 	<div>
      <input type="hidden" name="password" id="password" value="<?php echo $password ?>">
      <span id="string" style="display: none"><?php echo $string?></span>
  	</div>
  	<!--
    <div id="divImage">
  			<img src="img/foterminal.jpg" alt="TerminalFalloutImage"/>
  	</div>
  	-->

 	<div id="divTable">
 	
 		<p>Welcome to ROBCO Industries (TM) Termlink ===============================<br />
 			Password is required <br />
 		</p>
 		<p id="lifeCount">	Attempts remaining:</p>

 		<table>
 			<?php
 			//creación de las filas y columnas de la tabla
 				$horizontalLines = 16;
 				$verticalLines = 4;
 				$countLineCode = 1;
 			//empieza en el 1 para que coincida con el total de las strings de codigo

 				$countHexacode = 0;
 			//contador para seleccionar el índice del array_hexadecicmal



 				for ($i = 0; $i < $horizontalLines; $i++){
 					echo "<tr>";

 						for ($j = 0; $j < $verticalLines; $j++){
 							if ($j % 2 == 0){
 								//columnas de code hexadecimal
 								//poner id en los codigos Hexade, con el mismo codigo
 								echo "<td class='Hexade' id=".$array_hexadecimal[$countHexacode].">".$array_hexadecimal[$countHexacode]."</td>";
 								$countHexacode++;

 							}else{
 								//columnas de code
 								echo "<td class='code' id=".$countLineCode." >";

 								echo "</td>";
 								$countLineCode++;

 							}
 						}
 					echo "</tr>";
 				}

 			 ?>
 		</table>
 	</div>
 </div>
 </body>
 </html>
