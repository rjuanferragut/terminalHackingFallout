<?php
require_once('layouts/header.php');
require_once('../controllers/TerminalController.php');

// Valores por defecto del terminal.
$word_length = 5;
$helps_available = 3;
$total_words = 6;
$filename = "5chars.txt";
$difficult = "easy";

if(isset($_POST["difficult"])){
  if($_POST["difficult"] == 2){ // Si el usuario ha seleccionado la dificultad 'Normal', los valores se modifican por los siguientes:
    $word_length = 7;
    $helps_available = 2;
    $total_words = 10;
    $filename = "7chars.txt";
    $difficult = "normal";
  }else if($_POST["difficult"] == 3){ // El mismo caso pero para la dificultad 'Dificil'
    $word_length = 7;
    $helps_available = 1;
    $total_words = 10;
    $filename = "7chars.txt";
    $difficult = "hard";
  }
}else{
  // Si el usuario ha accedido por $_GET se le redirige a la pantalla de dificultad.
  header('Location: difficult.php');
}

session_start();
if(isset($_SESSION['prompt'])){
  $username =  $_SESSION['prompt'];
}else{
  $username = '';
}
setwordLength($word_length);
$array_words = array();
$array_select_words = array();
$array_helps = array();

$array_words = loadFile($filename);
$array_select_words = selectRandomWords($array_words, $total_words);
$array_helps = getHelpsAvailables($helps_available);

$string = generateSymbolsString();
//$string = setWords($array_select_words, $string, $total_words);
if(isset($_SESSION['string'])){
  $string = "Aaaaaaaaaaaaaaaaaaaaaaaaaaa";
}else{
  $string = setWords($array_select_words, $string, $total_words);
}
//array de los codigos hexadecimales ORDENADO POR LINEAS EN HORIZONTAL
$array_hexadecimal = array('0x7400','0x74C0','0X740C','0x74CC','0x7418','0x74D0','0x7424','0x74E4','0x7430','0x74F0','0x743C','0x74FC','0x7448','0x7500','0x7454','0x7514','0x7460','0x7520','0x746C','0x752C','0x7478','0x7530','0x7484','0x7544','0x7490','0x7550','0x749C','0x755C','0x74A8','0x7560','0x74B4','0x7574');
$password = getPassword($array_select_words);
?>
