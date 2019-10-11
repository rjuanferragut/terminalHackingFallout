
 <!DOCTYPE html>
 <html>
 <head>
 	<title>fallout terminal</title>
 	 <link rel="stylesheet" type="text/css" href="css/stylesheet.css">
 	 <meta name="viewport" content="width=device-width, user-scalable=no">
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

    // printArray($array_select_words);
    $password = getPassword($array_select_words);


 	?>

 </head>
 <body>
  <div>
      <input type="hidden" name="password" id="password" value="<?php echo $password ?>">
      <span id="string" style="display: none"><?php echo $string?></span>
  </div>
 	<div id="divTable">
 		<table>
 			<?php
 			//creación de las filas y columnas de la tabla
 				$horizontalLines = 16;
 				$verticalLines = 4;

 				for ($i = 0; $i < $horizontalLines; $i++){
 					echo "<tr>";

 						for ($j = 0; $j < $verticalLines; $j++){
 							if ($j % 2 == 0){
 								//columnas de code hexadecimal
 								echo "<td class='Hexade'>";
 								echo "</td>";

 							}else{
 								//columnas de code
 								echo "<td class='code'>";
 								echo "</td>";

 							}
 						}
 					echo "</tr>";
 				}



 			 ?>
 		</table>
 	</div>
 </body>
 </html>
