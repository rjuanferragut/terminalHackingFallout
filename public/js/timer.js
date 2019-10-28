var h = 0;
var i = 0;
var s = 0;
var m = 0;

window.addEventListener("load", function(event) {
    document.getElementById("timer").innerHTML = "00:00:00:00";
    cronometer();
});

function cronometer(){
  id = setInterval(printTime,15);
}

function printTime(){
  var hAux, iAux, sAux, mAux;
    m++;
    if (m>59){s++;m=0;}
    if (s>59){i++;s=0;}
    if (i>59){h++;i=0;}
    if (h>24){h=0;}

    if (m<10){mAux="0"+m;}else{mAux=m;}
    if (s<10){sAux="0"+s;}else{sAux=s;}
    if (i<10){iAux="0"+i;}else{iAux=i;}
    if (h<10){hAux="0"+h;}else{hAux=h;}

    document.getElementById("timer").innerHTML = hAux + ":" + iAux + ":" + sAux + ":" + mAux;
}
