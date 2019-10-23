// *******************************
// Script creado por Alexis Mengual y Rafa Juan
// *******************************

var stringFromPHP, password;
var positionsLetters = [];
var lifes = 4;

window.addEventListener("load", function(event) {
  document.getElementsByName('tries')[0].value = 1
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

        // Si cumple con este requisito, busco cual es la última posición
        getLastPosition = getLastPositionLetter(td_string, getFirstPosition[i]);

        if(getFirstPosition.length > 1){

/*
          if(getLastPosition == 12 && countCharacter(getFirstPosition[i], getLastPosition)!=5){
          //si una palabra cae al final de la linea, cuenta mal y repite id
          td_string = td_string.substring(0, getFirstPosition[i]) + '<span class="span spanId'+(countSpan)+'" onmouseover="hoverSpanOn(this)" onmouseout="hoverSpanOff(this)" onclick="checkWord(this)">' + td_string.substring(getFirstPosition[i], getLastPosition + 1) + '</span>' + td_string.substring(getLastPosition + 1, getFirstPosition[i + 1]) + '<span class="span spanId'+(countSpan+1)+'" onmouseover="hoverSpanOn(this)" onmouseout="hoverSpanOff(this)" onclick="checkWord(this)">' + td_string.substring(getFirstPosition[i + 1], getFirstPosition[i + 1] + 5) + '</span>' + td_string.substring(getFirstPosition[i + 1] + 5, td_string.length);
          countSpan += 2;
        }else{
        td_string = td_string.substring(0, getFirstPosition[i]) + '<span class="span spanId'+(countSpan)+'" onmouseover="hoverSpanOn(this)" onmouseout="hoverSpanOff(this)" onclick="checkWord(this)">' + td_string.substring(getFirstPosition[i], getLastPosition + 1) + '</span>' + td_string.substring(getLastPosition + 1, getFirstPosition[i + 1]) + '<span class="span spanId'+(countSpan+1)+'" onmouseover="hoverSpanOn(this)" onmouseout="hoverSpanOff(this)" onclick="checkWord(this)">' + td_string.substring(getFirstPosition[i + 1], getFirstPosition[i + 1] + 5) + '</span>' + td_string.substring(getFirstPosition[i + 1] + 5, td_string.length);
        countSpan += 2;
      }
*/
      if(countCharacter(getFirstPosition[i+1], getLastPosition +1)!=5){
        if (getLastPosition == 12){
          td_string = td_string.substring(0, getFirstPosition[i]) + '<span class="span spanId'+(countSpan)+'" onmouseover="hoverSpanOn(this)" onmouseout="hoverSpanOff(this)" onclick="checkWord(this)">' + td_string.substring(getFirstPosition[i], getLastPosition + 1) + '</span>' + td_string.substring(getLastPosition + 1, getFirstPosition[i + 1]) + '<span class="span spanId'+(countSpan+1)+'" onmouseover="hoverSpanOn(this)" onmouseout="hoverSpanOff(this)" onclick="checkWord(this)">' + td_string.substring(getFirstPosition[i + 1], getFirstPosition[i + 1] + 5) + '</span>' + td_string.substring(getFirstPosition[i + 1] + 5, td_string.length);
          countSpan += 1;
        }else if (getLastPosition != 12){
          console.log("Linea " + countLine + ": first char 2 word " + getFirstPosition[i+1] + "last char" + countCharacter(getFirstPosition[i+1],getLastPositionLetter(td_string, getFirstPosition[i+1])));
          if(countCharacter(getFirstPosition[i+1], getLastPosition + 1)==5){
            td_string = td_string.substring(0, getFirstPosition[i]) + '<span class="span spanId'+(countSpan+1)+'" onmouseover="hoverSpanOn(this)" onmouseout="hoverSpanOff(this)" onclick="checkWord(this)">' + td_string.substring(getFirstPosition[i], getLastPosition + 1) + '</span>' + td_string.substring(getLastPosition + 1, getFirstPosition[i + 1]) + '<span class="span spanId'+(countSpan+1)+'" onmouseover="hoverSpanOn(this)" onmouseout="hoverSpanOff(this)" onclick="checkWord(this)">' + td_string.substring(getFirstPosition[i + 1], getFirstPosition[i + 1] + 5) + '</span>' + td_string.substring(getFirstPosition[i + 1] + 5, td_string.length);
            countSpan += 2;
          }else{
            td_string = td_string.substring(0, getFirstPosition[i]) + '<span class="span spanId'+(countSpan)+'" onmouseover="hoverSpanOn(this)" onmouseout="hoverSpanOff(this)" onclick="checkWord(this)">' + td_string.substring(getFirstPosition[i], getLastPosition + 1) + '</span>' + td_string.substring(getLastPosition + 1, getFirstPosition[i + 1]) + '<span class="span spanId'+(countSpan+1)+'" onmouseover="hoverSpanOn(this)" onmouseout="hoverSpanOff(this)" onclick="checkWord(this)">' + td_string.substring(getFirstPosition[i + 1], getFirstPosition[i + 1] + 5) + '</span>' + td_string.substring(getFirstPosition[i + 1] + 5, td_string.length);
            countSpan += 1;
          }

        }

      }else{
        td_string = td_string.substring(0, getFirstPosition[i]) + '<span class="span spanId'+(countSpan)+'" onmouseover="hoverSpanOn(this)" onmouseout="hoverSpanOff(this)" onclick="checkWord(this)">' + td_string.substring(getFirstPosition[i], getLastPosition + 1) + '</span>' + td_string.substring(getLastPosition + 1, getFirstPosition[i + 1]) + '<span class="span spanId'+(countSpan+1)+'" onmouseover="hoverSpanOn(this)" onmouseout="hoverSpanOff(this)" onclick="checkWord(this)">' + td_string.substring(getFirstPosition[i + 1], getFirstPosition[i + 1] + 5) + '</span>' + td_string.substring(getFirstPosition[i + 1] + 5, td_string.length);
        countSpan += 1;
      }

      i++;
    }else{
      if(getLastPosition == 12 && countCharacter(getFirstPosition[i], getLastPosition)!=5){
        td_string = td_string.substring(0, getFirstPosition[i]) + '<span class="span spanId'+(countSpan)+'" onmouseover="hoverSpanOn(this)" onmouseout="hoverSpanOff(this)" onclick="checkWord(this)">' + td_string.substring(getFirstPosition[i], getLastPosition + 1) + '</span>' + td_string.substring(getLastPosition + 1, td_string.length);

      }else{
        td_string = td_string.substring(0, getFirstPosition[i]) + '<span class="span spanId'+(countSpan)+'" onmouseover="hoverSpanOn(this)" onmouseout="hoverSpanOff(this)" onclick="checkWord(this)">' + td_string.substring(getFirstPosition[i], getLastPosition + 1) + '</span>' + td_string.substring(getLastPosition + 1, td_string.length);
        countSpan += 1;
      }
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
  var text = "";
  var classname = getSpansByClassName(element.classList.item(1))

  for (var i = 0; i < classname.length; i++) {
    text += classname[i].innerText;
  }

  setInfoPrompt(text);

  if (text == password) {
    clearInterval(id);
    document.getElementsByName('game_time')[0].value = document.getElementById('timer').innerText;
    setInfoPrompt('Correct Password');
    setInfoPrompt('Introduce tu nombre:');
    settingsInputPrompt("", false, true);
    printResult("Enhorabuena, has acertado la palabra!");
    // Si la password es correcta añadir un input o destapar un input hidden en el que se pueda meter el nombre y guardarlo en un fichero

  }else{
    lifes -= 1;
    if (lifes == 0){
      printResult("Has perdido, terminal bloqueado.<br />Respuesta = "+ password);
      clearInterval(id);
    }
    document.getElementsByName('tries')[0].value = parseInt(document.getElementsByName('tries')[0].value) + parseInt(1);
    setInfoPrompt('Entry Denied');
    setInfoPrompt('Likeness = '+ countSimilarAlpha(text, password));
    changeWordsForPoints(classname);
    printLifes();
  }
}
function countSimilarAlpha(word, password){
  var countSimilarity = 0;
  var charWord = "";
  var charpass = "";
  for(var i = 0; i < 5; i++){
    charWord = word[i];
    charPass = password[i];
    if(charWord ==  charPass){
      countSimilarity += 1;
    }
  }
  return countSimilarity;
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

function changeWordsForPoints(classname){
  for (var i = 0; i < classname.length; i++) {
    var pointSubs = "";

    console.log("Palabra: " + classname[i].innerText + "\nTamaño: " + classname[i].innerText.length)
    for (var j = 0; j < classname[i].innerText.length; j++) {
      pointSubs += ".";
    }

    classname[i].innerHTML = pointSubs;
  }

  removeAttributesOfClass(classname);
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
