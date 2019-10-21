var h = 0;
var m = 0;
var s = 0;

window.addEventListener("load", function(event) {
    document.getElementById("timer").innerHTML = "00:00:00";
    cronometer();
});

function cronometer(){
  id = setInterval(printTime,1000);
}

function printTime(){
  var hAux, mAux, sAux;
    s++;
    if (s>59){m++;s=0;}
    if (m>59){h++;m=0;}
    if (h>24){h=0;}

    if (s<10){sAux="0"+s;}else{sAux=s;}
    if (m<10){mAux="0"+m;}else{mAux=m;}
    if (h<10){hAux="0"+h;}else{hAux=h;}

    document.getElementById("timer").innerHTML = hAux + ":" + mAux + ":" + sAux;
}
