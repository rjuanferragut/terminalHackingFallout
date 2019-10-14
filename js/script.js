//churro con id = string
//id = password en value.
//las td en las que va el codigo van con un id del 1 al 32
//total 384 char
document.addEventListener("DOMContentLoaded", function(event){
	var stringjs = document.getElementById("string").innerText;
	var passwd = document.getElementById("password").value;


	var countLine = 1;
	//contador de lineas de codigo, ha de coincidir
	var countChar = 0;
	var countLastChar = 12;
	//contador de caracteres

	for (countLine; countLine <= 32; countLine++){
		var str = "";
		//variable donde se guarda el string de 12 caracteres
		str = stringjs.slice(countChar, countLastChar);
		countChar = countLastChar;
		countLastChar += 12;
<<<<<<< HEAD

		document.getElementById(countLine).innerHTML = churro;
=======
		
		document.getElementById(countLine).innerHTML = str;
>>>>>>> ad4e313f2447742e1cb3d7d0292916cc5ab7b578
	}
});
