// *******************************
// Script creado por Alexis Mengual y Rafa Juan
// *******************************

var stringFromPHP, password;
var positionsLetters = [];
var lifes = 4;
var word_length = 0;
var helpers = "";
var helpers_available = 0;
var numHelps = 0;

window.addEventListener("load", function(event) {
  document.getElementsByName('tries')[0].value = 1
  settingsInputPrompt("", true, false);
  stringFromPHP = document.getElementById('string').innerText;
  password = document.getElementById('password').value;
  word_length = parseInt(document.getElementById('word_length').innerText);

  //reemplaza los saltos de linea de la Password
  password = password.replace("\n", "");
  helpers = document.getElementById('helpers').innerText;
  helpers = helpers.split(";");

  helpers_available = document.getElementById('helpers_available').innerText;

  getTerminal();
  printLifes();
});

// Método para montar la tabla que simulará el contenido del terminal.
function getTerminal(){
  var countLine = 0;
  var countChar = 0;
  var countLastChar = 12;
  var countSpan = 0;
  var countHelpers = 0;

  for(countLine; countLine < 32; countLine++){
    // Guardo cada separación de línea en la variable row
    var row = stringFromPHP.slice(countChar, countLastChar);
    getFirstPosition = getPositionLetter(row);

    // Método para la gestión de las palabras
    if(getFirstPosition.length != 0){
      for (var i = 0; i < getFirstPosition.length; i++) {
        // Si es mayor o igual a 0, es que ha encontrado una letra.
        if(getFirstPosition[i] >= 0){

          // Si cumple con este requisito, busco cual es la última posición
          getLastPosition = getLastPositionLetter(row, getFirstPosition[i]);

          // Si el array es tiene más de un valor:
          if(getFirstPosition.length > 1){
              if(countCharacter(getFirstPosition[i], getLastPosition) != word_length){
                  if(getLastPosition == 12){
                      row = row.substring(0, getFirstPosition[i]) + '<span class="span spanId'+(countSpan)+'" onmouseover="hoverSpanOn(this)" onmouseout="hoverSpanOff(this)" onclick="checkWord(this)">' + row.substring(getFirstPosition[i], getLastPosition + 1) + '</span>' + row.substring(getLastPosition + 1, getFirstPosition[i + 1]) + '<span class="span spanId'+(countSpan+1)+'" onmouseover="hoverSpanOn(this)" onmouseout="hoverSpanOff(this)" onclick="checkWord(this)">' + row.substring(getFirstPosition[i + 1], getFirstPosition[i + 1] + word_length) + '</span>' + row.substring(getFirstPosition[i + 1] + word_length, row.length);
                      countSpan += 1;
                  }else{
                      row_copy = row;
                      row = row.substring(0, getFirstPosition[i]) + '<span class="span spanId'+(countSpan)+'" onmouseover="hoverSpanOn(this)" onmouseout="hoverSpanOff(this)" onclick="checkWord(this)">' + row.substring(getFirstPosition[i], getLastPosition + 1) + '</span>' + row.substring(getLastPosition + 1, getFirstPosition[i + 1]) + '<span class="span spanId'+(countSpan+1)+'" onmouseover="hoverSpanOn(this)" onmouseout="hoverSpanOff(this)" onclick="checkWord(this)">' + row.substring(getFirstPosition[1], getFirstPosition[i + 1] + word_length) + '</span>' + row.substring(getFirstPosition[i + 1] + word_length, row.length);
                      getLastPositionSecondWord = getLastPositionLetter(row_copy, getFirstPosition[1]);
                      console.log('Primera posición: ' + getFirstPosition[1]);
                      console.log('Última posición: ' + getLastPositionSecondWord);
                      console.log(countCharacter(getFirstPosition[1], getLastPositionSecondWord));
                      if(getLastPositionSecondWord != 12 && countCharacter(getFirstPosition[1], getLastPositionSecondWord) == word_length - 1 || countCharacter(getFirstPosition[1], getLastPositionSecondWord) == word_length){
                        countSpan += 2;
                      }else{
                        countSpan += 1;
                      }
                  }
              }
              i++;
          }else{
            if(getLastPosition == 12 && countCharacter(getFirstPosition[i], getLastPosition) != word_length){
              row = row.substring(0, getFirstPosition[i]) + '<span class="span spanId'+(countSpan)+'" onmouseover="hoverSpanOn(this)" onmouseout="hoverSpanOff(this)" onclick="checkWord(this)">' + row.substring(getFirstPosition[i], getLastPosition + 1) + '</span>' + row.substring(getLastPosition + 1, row.length);
            }else{
                row = row.substring(0, getFirstPosition[i]) + '<span class="span spanId'+(countSpan)+'" onmouseover="hoverSpanOn(this)" onmouseout="hoverSpanOff(this)" onclick="checkWord(this)">' + row.substring(getFirstPosition[i], getLastPosition + 1) + '</span>' + row.substring(getLastPosition + 1, row.length);
                countSpan += 1;
            }
          }
        }
      }
    }else{
      if(countHelpers != helpers_available){
        var current_help = helpers[countHelpers];
        current_help = current_help.replace(/\s/g, '');
        console.log(current_help)
        var length_help = current_help.length;
        current_help = "(" + current_help.substring(1, current_help.length - 1) + ")";
        current_help = '<span id="helper-'+countHelpers+'" class="helper" onclick="getHelp(this)">' + current_help + '</span>';

        row = row.substring(length_help, row.length);
        row = current_help + row;

        countHelpers++;
      }
    }

    countChar = countLastChar;
    countLastChar += 12;
    document.getElementById('row-codification-'+countLine).innerHTML = row;
  }
}

// Método para comprobar si la palabra correcta és la password y convertirlo en puntos si es incorrecto
function checkWord(element){
  var text = "";
  var classname = getSpansByClassName(element.classList.item(1))

  for (var i = 0; i < classname.length; i++) {
    text += classname[i].innerText;
  }

  setInfoPrompt(text);

  if (text == password) {
    clearInterval(id);
    document.getElementsByName('game_time')[0].value = document.getElementById('timer').innerText;

    document.getElementsByClassName('content-prompt')[0].innerText = "";
    document.getElementsByClassName('input-prompt')[1].type = 'text';
    setInfoPrompt('Correct Password');
    setInfoPrompt('Introduce tu nombre:');
    settingsInputPrompt("", false, true);
  //  printResult("Enhorabuena, has acertado la palabra!");

    document.getElementsByClassName('col md-12')[0].innerText = "";
    document.getElementsByClassName('container')[0].style = "margin-top: 18%; display:block;";
    printResult('<img class="imgWin" src="../public/img/giphyWin2.gif" alt="WELL DONE" style="width: 75%;">');
    document.getElementById('prompt').style = "display:block;margin-top:10%;";
    document.getElementsByClassName('row justify-content-center')[0].style = "margin-left: 18%";


  }else{
    lifes -= 1;
    if (lifes == 0){

      clearInterval(id);
      document.getElementsByClassName('col md-12')[0].innerText = "";
      document.getElementsByClassName('content-prompt')[0].innerText = "";
      document.getElementsByClassName('container')[0].style = "margin-top: 15%; display:block;";
      document.getElementById('prompt').style = "display:block;margin-top:10%;";
      document.getElementById('terminal-table').style = "margin:0 auto;";

      setInfoPrompt('Wrong Password');
      setInfoPrompt("terminal bloqued");
      setInfoPrompt("Respuesta = "+ password);
      printResult('<img class="imgLose" src="../public/img/giphyLose2.gif" alt="GAME OVER" style="width:75%;">');
      document.getElementsByClassName('container')[0].innerHTML +='<div id="buttons"> <a href="terminal.php">Volver a Jugar</a>  <a href="ranking.php">Ver Ranking</a> <a href="index.php">Página Principal</a></div>'


    }else{
    document.getElementsByName('tries')[0].value = parseInt(document.getElementsByName('tries')[0].value) + parseInt(1);
    setInfoPrompt('Entry Denied');
    setInfoPrompt('Likeness = '+ countSimilarAlpha(text, password));
    changeWordsForPoints(classname, true);
    printLifes();
    }
  }
}

function countSimilarAlpha(word, password){
  var countSimilarity = 0;
  var charWord = "";
  var charpass = "";
  for(var i = 0; i < word_length; i++){
    charWord = word[i];
    charPass = password[i];
    if(charWord ==  charPass){
      countSimilarity += 1;
    }
  }
  return countSimilarity;
}


// Método para obtener la primera posición de la letra en el string
function getPositionLetter(row){
  var array_first_positions = [];
  var i = 0;
  while(i < row.length){
    if(row[i].match(/[a-zA-Z ]+/)){
      array_first_positions.push(i);
      if(i >= 0 && i<= 4 && !row[i + 1].match(/[a-zA-Z ]+/)){
        i++;
      }else{
        i += word_length;
      }
    }else{
      i++;
    }
  }
  return array_first_positions;
}

// Método para obtener la última posición de la letra en el string
function getLastPositionLetter(row, firstPosition){
  for (var i = firstPosition; i < row.length; i++) {
    if((i + 1) < row.length){
      if(!row[i + 1].match(/[a-zA-Z ]+/)){
        return i;
      }
    }
  }

  return row.length;
}

function changeWordsForPoints(name, isClass){
  console.log(name + " - " + isClass)
  if(isClass){
    for (var i = 0; i < name.length; i++) {
      var pointSubs = "";
      for (var j = 0; j < name[i].innerText.length; j++) {
        pointSubs += ".";
      }
      name[i].innerHTML = pointSubs;
    }

    removeAttributesOfClass(name);
  }else{
    var pointSubs = "";
    // console.log(name.innerText);
    for (var i = 0; i < name.innerText.length; i++) {
      pointSubs += ".";
    }

    name.innerHTML = pointSubs;
  }
}

function removeAttributesOfClass(classname){
  for (var i = 0; i < classname.length; i++) {
    classname[i].onclick = null;
    classname[i].onmouseover = null;
    classname[i].onmouseout = null;
    classname[i].classList.remove('hover');
  }
}

//Metodo que cuenta
function countCharacter(firstPosition, lastPosition){
  return lastPosition - firstPosition;
}

function settingsInputPrompt(text, isReadOnly, isFocus){
  document.getElementsByName('prompt')[0].value = text;
  document.getElementsByName('prompt')[0].readOnly = isReadOnly;
  if(isFocus){
    document.getElementsByName('prompt')[0].focus();
  }
}

function getSpansByClassName(classname){
  return document.getElementsByClassName(classname);
}

function getHelp(elem){
  if(numHelps % 2 == 0){
    callHelp1(elem);
  }else{
    callHelp2(elem);
  }

  numHelps++;

  elem.onclick = null;
  elem.classList = null;
}

function callHelp1(elem){
  setInfoPrompt("Ejecutando Ayuda de Tipo 1");
  setInfoPrompt("Restableciendo vidas...");
  lifes = 4;
  printLifes();
  changeWordsForPoints(elem, false);
}

function callHelp2(elem){
  setInfoPrompt("Ejecutando Ayuda de Tipo 2");
  var info = getRandomWordForHelp2();

  while(info[1].includes('.')){
    info = getRandomWordForHelp2();
  }

  if(info[1] != password){
    setInfoPrompt("Eliminando la palabra '" + info[1] + "'");
    changeWordsForPoints(info[0], true);
    changeWordsForPoints(elem, false);
  }
}

function getRandomWordForHelp2(){
  var info = [];
  var stringFromClass = "";
  var randomId = Math.floor(Math.random() * (6 - 0)) + 0;
  var getSpanId = "spanId" + randomId;
  var classElements = getSpansByClassName(getSpanId);
  for (var i = 0; i < classElements.length; i++) {
    stringFromClass = stringFromClass + classElements[i].innerText;
  }

  info.push(classElements);
  info.push(stringFromClass);

  return info;
}
