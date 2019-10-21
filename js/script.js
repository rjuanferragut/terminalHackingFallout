// *******************************
// Script creado por Alexis Mengual y Rafa Juan
// *******************************

var stringFromPHP, password;
var positionsLetters = [];
var lifes = 4;

window.addEventListener("load", function(event) {
    document.getElementsByName('tries')[0].value = 0
    settingsInputPrompt("", true, false);
    stringFromPHP = document.getElementById('string').innerText;
    password = document.getElementById('password').value;

    //reemplaza los saltos de linea de la Password
    password = password.replace("\n", "");

    getTerminal();
    printLifes();
});

// Método para montar la tabla que simulará el contenido del terminal.
function getTerminal(){
  var nameId = '';
  var countLine = 0;
  var countChar = 0;
  var countLastChar = 12;
  var countSpan = 0;

  for (countLine; countLine < 32; countLine++){
    var td_string = stringFromPHP.slice(countChar, countLastChar);
    getFirstPosition = getPositionLetter(td_string);
    for (var i = 0; i < getFirstPosition.length; i++) {
      // Si es mayor o igual a 0, es que ha encontrado una letra.
      if(getFirstPosition[i] >= 0){
        countSpan += 1;
        // Si cumple con este requisito, busco cual es la última posición
        getLastPosition = getLastPositionLetter(td_string, getFirstPosition[i]);
        if(getFirstPosition.length > 1){
          td_string = td_string.substring(0, getFirstPosition[i]) + '<span class="span" id="spanId'+(countSpan)+'" onclick="checkWord(this)">' + td_string.substring(getFirstPosition[i], getLastPosition + 1) + '</span>' + td_string.substring(getLastPosition + 1, getFirstPosition[i + 1]) + '<span class="span" id="spanId'+(countSpan+1)+'" onclick="checkWord(this)">' + td_string.substring(getFirstPosition[i + 1], getFirstPosition[i + 1] + 5) + '</span>' + td_string.substring(getFirstPosition[i + 1] + 5, td_string.length);
          i++;

        }else{
          td_string = td_string.substring(0, getFirstPosition[i]) + '<span class="span" id="spanId'+(countSpan)+'" onclick="checkWord(this)">' + td_string.substring(getFirstPosition[i], getLastPosition + 1) + '</span>' + td_string.substring(getLastPosition + 1, td_string.length);
        }
      }
    }

    countChar = countLastChar;
    countLastChar += 12;
    document.getElementById('row-codification-'+countLine).innerHTML = td_string;
  }
}

// Método para comprobar si la palabra correcta és la password y convertirlo en puntos si es incorrecto
function checkWord(element){
  setInfoPrompt(element.innerText);

  if (element.innerText == password) {
      changeWordsForPoints(element);
      setInfoPrompt('Correct Password');
      setInfoPrompt('Introduce tu nombre:');
      settingsInputPrompt("", false, true);
      printResult("Enhorabuena, has acertado la palabra!");
      // Si la password es correcta añadir un input o destapar un input hidden en el que se pueda meter el nombre y guardarlo en un fichero

  }else{
      lifes -= 1;
      document.getElementsByName('tries')[0].value = parseInt(document.getElementsByName('tries')[0].value) + parseInt(1);
      changeWordsForPoints(element);
      setInfoPrompt('Entry Denied');
      printLifes();
    }
}

// Método para añadir el texto en el prompt
function setInfoPrompt(text){
  document.getElementsByClassName('content-prompt')[0].innerHTML = document.getElementsByClassName('content-prompt')[0].innerHTML + '<p>>' + text + '</p>';
}


// Método para obtener la primera posición de la letra en el string
function getPositionLetter(td_string){
  var array_first_positions = [];
  var i = 0;
  while(i < td_string.length){
    if(td_string[i].match(/[a-zA-Z ]+/)){
      array_first_positions.push(i);
      if(i >= 0 && i<= 4 && !td_string[i + 1].match(/[a-zA-Z ]+/)){
        i++;
      }else{
        i += 5;
      }
    }else{
      i++;
    }
  }

  return array_first_positions;
}

// Método para obtener la última posición de la letra en el string
function getLastPositionLetter(td_string, firstPosition){
    for (var i = firstPosition; i < td_string.length; i++) {
        if((i + 1) < td_string.length){
            if(!td_string[i + 1].match(/[a-zA-Z ]+/)){
                return i;
            }
        }
    }

    return td_string.length;
}

function changeWordsForPoints(element){
  var pointSubs = "";
  var length = 0;

  while (length < element.innerHTML.length){
      pointSubs += ".";
      length += 1;
  }

  element.innerHTML = pointSubs;
  element.classList = null;
}

function settingsInputPrompt(text, isReadOnly, isFocus){
    document.getElementsByName('prompt')[0].value = text;
    document.getElementsByName('prompt')[0].readOnly = isReadOnly;
    if(isFocus){
      document.getElementsByName('prompt')[0].focus();
    }
}

function printResult(text){
  document.getElementById('terminal-table').innerHTML = "<h4>" + text + "</h4>"
}

function printLifes(){
    document.getElementById('lifesCount').innerHTML = "";
    for (var i = 0; i < lifes; i++) {
      document.getElementById('lifesCount').innerHTML += '<i class="fas fa-square-full"></i> ';
    }
}
