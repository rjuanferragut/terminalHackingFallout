// Método para añadir el texto en el prompt
function setInfoPrompt(text){
  document.getElementsByClassName('content-prompt')[0].innerHTML = document.getElementsByClassName('content-prompt')[0].innerHTML + '<p>>' + text + '</p>';
}

function printResult(text){
  document.getElementById('terminal-table').innerHTML = "<h4>" + text + "</h4>"
}

function printLifes(){
  document.getElementById('lifesCount').innerHTML = '';
  for (var i = 0; i < lifes; i++) {
    document.getElementById('lifesCount').innerHTML += '<i class="fas fa-square-full"></i> ';
  }
}

function hoverSpanOn(element){
  var classname = getSpansByClassName(element.className.split(" ")[1])
  for (var i = 0; i < classname.length; i++) {
    classname[i].classList.add('hover')
  }
}

function hoverSpanOff(element){
  var classname = getSpansByClassName(element.className.split(" ")[1])
  for (var i = 0; i < classname.length; i++) {
    classname[i].classList.remove('hover')
  }
}
