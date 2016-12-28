var pomo = 0;
var brk = 0;
var pomoCount = 0;
var pomoLength = 25 * 1000 /* * 60 */;
var brekLength = 5 * 1000 /* * 60 */;

function pomoStart() {
    console.log("Pomo started");
    pomo = setInterval(pomoEnd, 25000);
    pomoCount = setInterval(pomoCountEnd, 1000);
}

function pomoEnd() {
    alert("Pomo ended");
    clearInterval(pomo);
    console.log("Pomo ended");
    breakStart();
}

function pomoCountEnd() {
    console.log(minutes + ":" + seconds);
}

function breakStart() {
    console.log("Break started");
    brk = setInterval(breakEnd, 5000);
}

function breakEnd() {
    alert("Break ended");
    console.log("Break ended");
    clearInterval(brk);
    pomoStart();
}

function pomoStop() {
    console.log("Stop pomo session");
    clearInterval(pomo);
    clearInterval(brk);
}

$(document).ready(function() {
    $("#pomoStart").click(pomoStart);
    $("#stop").click(pomoStop);
});


