// *******************************
// Script creado por Alexis Mengual y Rafa Juan
// *******************************

var stringFromPHP, password;
var positionsLetters = [];

window.addEventListener("load", function(event) {

  stringFromPHP = document.getElementById('string').innerText;
  password = document.getElementById('password').value;
  //reemplaza los saltos de linea de la Password
  password = password.replace("\n", "");


  getTerminal();

  document.getElementById('lifesCount').innerHTML = '<i class="fas fa-square"></i> <i class="fas fa-square"></i> <i class="fas fa-square"></i> <i class="fas fa-square"></i>'

});

// Método para montar la tabla que simulará el contenido del terminal.
function getTerminal(){
  var countLine = 1;
  var countChar = 0;
  var countLastChar = 12;

  for (countLine; countLine <= 32; countLine++){
    var td_string = stringFromPHP.slice(countChar, countLastChar);
    getFirstPosition = getPositionLetter(td_string);

    for (var i = 0; i < getFirstPosition.length; i++) {
      // Si es mayor o igual a 0, es que ha encontrado una letra.
      if(getFirstPosition[i] >= 0){
        // Si cumple con este requisito, busco cual es la última posición
        getLastPosition = getLastPositionLetter(td_string, getFirstPosition[i]);

        if(getFirstPosition.length > 1){
          td_string = td_string.substring(0, getFirstPosition[i]) + '<span class="span" onclick="checkWord(this)">' + td_string.substring(getFirstPosition[i], getLastPosition + 1) + '</span>' + td_string.substring(getLastPosition + 1, getFirstPosition[i + 1]) + '<span class="span" onclick="checkWord(this)">' + td_string.substring(getFirstPosition[i + 1], getFirstPosition[i + 1] + 5) + '</span>' + td_string.substring(getFirstPosition[i + 1] + 5, td_string.length);
          i++;
        }else{
          td_string = td_string.substring(0, getFirstPosition[i]) + '<span class="span" onclick="checkWord(this)">' + td_string.substring(getFirstPosition[i], getLastPosition + 1) + '</span>' + td_string.substring(getLastPosition + 1, td_string.length)
        }
      }
    }

    countChar = countLastChar;
    countLastChar += 12;
    document.getElementById(countLine).innerHTML = td_string;
  }
}

// Método para comprobar si la palabra correcta és la password y convertirlo en puntos si es incorrecto
function checkWord(element){
console.log(element.innerText);
console.log(element.innerText == password);

  if (element.innerText == password) {
    //prueba
    element.innerHTML = "great";
  }else{
    element.innerHTML = ".....";
  }
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
