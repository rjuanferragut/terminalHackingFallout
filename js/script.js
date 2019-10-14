//churro con id = string
//id = password en value.
//las td en las que va el codigo van con un id del 1 al 32
//total 384 char
document.addEventListener("DOMContentLoaded", function(event){
	var stringFromPHP = document.getElementById("string").innerText;
	var passwd = document.getElementById("password").value;

	// var countLine = 1;
	// //contador de lineas de codigo, ha de coincidir
	// var countChar = 0;
	// var countLastChar = 12;
	// //contador de caracteres

	var getFirst = 0;
	var getLast = 0;

	var positions = [];

	for (var i = 0; i < stringFromPHP.length; i++) {
			if(stringFromPHP[i].match(/[a-zA-Z ]+/)){
					if(getFirst == 0){
							getFirst = i;
					}else{
							if(!stringFromPHP[i + 1].match(/[a-zA-Z ]+/)){
									getLast = i;
									positions.push(getFirst);
									positions.push(getLast);

									getFirst = 0;
							}
					}
			}
	}

	// for (countLine; countLine <= 32; countLine++){
	// 	var str = "";
	// 	// Variable donde se guarda el string de 12 caracteres
	// 	str = stringjs.slice(countChar, countLastChar);
	//
	// 	if(str.match(/[a-zA-Z ]+/)){
	//
	// 	}
	//
	// 	countChar = countLastChar;
	// 	countLastChar += 12;
	// 	document.getElementById(countLine).innerHTML = str;
	// }
});
