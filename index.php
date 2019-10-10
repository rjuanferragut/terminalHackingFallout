<?php

require_once('controller.php');

$array_words = array();
$array_select_words = array();

$array_words = loadFile($array_words);
// printArray($array_words);

$array_select_words = selectRandomWords($array_words);
printArray($array_select_words);

// generateString();

 ?>
