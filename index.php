
 <!DOCTYPE html>
 <html>
 <head>
 	<title>fallout terminal</title>
 	 <link rel="stylesheet" type="text/css" href="css/stylesheet.css">
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
 	?>

 </head>
 <body>
 	<!--falta agregar divs y meter el texto dentro y codigos de memoria-->
 </body>
 </html>
