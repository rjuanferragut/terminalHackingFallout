//churro con id = string
//id = password en value.
//las td en las que va el codigo van con un id del 1 al 32
//total 384 char

	var stringjs = document.getElementById("string").innerHTML;
	
	var passwd = document.getElementById("password").value;
	

	var countLine = 1;
	//contador de lineas de codigo, ha de coincidir
	var countChar = 0;
	var countLastChar = 11;
	//contador de caracteres

	for (countLine; countLine <= 32; countLine++){
		var churro = "";
		//variable donde se guarda el string de 12 caracteres
		churro = stringjs.slice(countChar, countLastChar);
		countChar += 12;
		countLastChar += 12;
		
		document.getElementById(countLine).innerHTML = churro;
	}
