// *******************************
// Script creado por Alexis Mengual y Rafa Juan
// *******************************

var stringFromPHP, password;
var positionsLetters = [];

window.addEventListener("load", function(event) {

    stringFromPHP = document.getElementById('string').innerText;
    password = document.getElementById('password').value;

    // Método que obtiene la posición de inicio y final de cada palabra en el String.
    calculatePositions();

    getTerminal();

});


function calculatePositions(){
    var getFirst = 0;
    var getLast = 0;

		for (var i = 0; i < stringFromPHP.length; i++) {
				if(stringFromPHP[i].match(/[a-zA-Z ]+/)){
						if(getFirst == 0){
								getFirst = i;
						}else{
								if(!stringFromPHP[i + 1].match(/[a-zA-Z ]+/)){
										getLast = i;
										positionsLetters.push(getFirst);
										positionsLetters.push(getLast);

										getFirst = 0;
								}
						}
				}
		}
}


function getTerminal(){
    var countLine = 1;
    var countChar = 0;
  	var countLastChar = 12;

    for (countLine; countLine <= 32; countLine++){
        var td_string = stringFromPHP.slice(countChar, countLastChar);
        getFirstPosition = getPositionLetter(td_string);

        // Si es mayor o igual a 0, es que ha encontrado una letra.
        if(getFirstPosition >= 0){
            // Si cumple con este requisito, busco cual es la última posición
            getLastPosition = getLastPositionLetter(td_string, getFirstPosition);
            console.log("Primera Posición: " + getFirstPosition + "\nÚltima Posición: " + getLastPosition + "\nCadena: " + td_string)
            td_string = td_string.substring(0, getFirstPosition) + '<span style="background: #00F501; color: black">' + td_string.substring(getFirstPosition, getLastPosition + 1) + '</span>' + td_string.substring(getLastPosition + 1, td_string.length)
            console.log("\nResultado con spans incluidos: " + td_string);
        }

        countChar = countLastChar;
  			countLastChar += 12;
        document.getElementById(countLine).innerHTML = td_string;
    }
}

// Método para obtener la primera posición de la letra en el string
function getPositionLetter(td_string){
    for (var i = 0; i < td_string.length; i++) {
        if(td_string[i].match(/[a-zA-Z ]+/)){
            return i;
        }
    }

    return -1;
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
