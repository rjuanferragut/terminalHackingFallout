
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

    echo getPassword($array_select_words);


 	?>

 </head>
 <body>

 	<div id="divTable">
 		<table>

<<<<<<< HEAD
=======
 			<?php
 			//creación de las filas y columnas de la tabla
 				$horizontalLines = 16;
 				$verticalLines = 4;

 				for ($i = 0; $i < intval($horizontalLines); $i++){
 					echo "<tr>";

 						for ($j = 0; $j < int($verticalLines); $j++){
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

>>>>>>> 34d40b455ba5414a767c59ee39fc1090f6724501


 		</table>
 	</div>
 </body>
 </html>
