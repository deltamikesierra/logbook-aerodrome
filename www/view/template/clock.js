//variable qui permet d'identifier le timer afin de pouvoir l'arrêter
var timerID = null;
var timerActif = false;

function stopClock() {
  if (timerActif) clearTimeout(timerID);
  timerActif = false;
}

function startClock() {
  stopClock();
  showtime();
}

function showtime() {
  var now = new Date();
  var hour = now.getHours();
  var min = now.getMinutes();
  hm = (hour > 9? hour:"0" + hour);
  hm += ":" + (min > 9? min:"0" + min);
  $("#clock").text(hm);
  timerID = setTimeout("showtime()",10000);
  timerActif = true;
}
