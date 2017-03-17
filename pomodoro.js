var pomo = 0;
var brk = 0;
var pomoCount = 0;

const POMO_LENGTH = 15 * 1000;
const BREK_LENGTH = 15 * 1000;

pomoLength = POMO_LENGTH;
brekLength = BREK_LENGTH;
 
function enterTag(e) {
    if(event.keyCode == 13) {
        console.log("PRESSED ENTER");

        $("#tag").unbind("keyup", enterTag)
        tag = document.getElementById("tag").value;

        document.getElementById("pomoTags").innerHTML += "<br />" + tag;

        console.log("Pomo ended");

        breakStart();
    }
}

function pomoStart() {
    console.log("Pomo started");
    pomo = setInterval(pomoEnd, 1000);
}

function pomoEnd() {
    minutes = Math.floor(pomoLength / 1000 / 60);
    seconds = (pomoLength - minutes * 1000 * 60) / 1000;
    document.getElementById("timer").innerHTML = minutes + " min " + seconds + " sec";
    document.getElementById("pomoLabel").style.display = "inline";
    document.getElementById("breakLabel").style.display = "none";

   if(pomoLength === 0) {
        alert("Pomo ended");
        clearInterval(pomo);

        pomoCount++;
        document.getElementById("pomoCount").innerHTML = pomoCount + " pomodoros";

        tag = ""

        $("#tag").keyup(enterTag);
       
    }    

    else {
        pomoLength -= 1000;
    }
}

function breakStart() {
   $("#tag").blur();
                
    document.getElementById("tag").onkeyup = null;

    console.log("Break started");
    brk = setInterval(breakEnd, 1000);
}

function breakEnd() {
    minutes = Math.floor(brekLength / 1000 / 60);
    seconds = ((brekLength - (minutes * 60 * 1000))/ 1000);
    document.getElementById("timer").innerHTML = minutes + " min " + seconds + " sec";
    document.getElementById("breakLabel").style.display = "inline";
    document.getElementById("pomoLabel").style.display = "none";

    if(brekLength === 0) {
        alert("Break ended");
        console.log("Break ended");
        clearInterval(brk);
        pomoStart();
        brekLength = BREK_LENGTH;
        pomoLength = POMO_LENGTH;
    }

    else {
        brekLength -= 1000;
    }
}

function pomoStop() {
    console.log("Stop pomo session");
    clearInterval(pomo);
    clearInterval(brk);
    pomoLength = POMO_LENGTH;
    brekLength = BREK_LENGTH;
}

$(document).ready(function() {
    $("#pomoStart").click(pomoStart);
    $("#stop").click(pomoStop);
});
