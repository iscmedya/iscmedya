

var now = new Date();

changeTime();

function changeTime(){
if(now.getHours() < 10)
hours = “0” + now.getHours();
else
hours = now.getHours();
if(now.getMinutes() < 10)
minutes = “0” + now.getMinutes();
else
minutes = now.getMinutes();

if(now.getSeconds() < 10)
seconds = “0” + now.getSeconds();
else
seconds = now.getSeconds();

document.getElementById(“time”).value = hours + “:” + minutes + “:” + seconds;

if(document.getElementById(“Stop”).value == “1”)
setTimeout(changeTime,1000);
time = now.getTime();
now.setTime(time+1000);
}

function StopIt(){
document.getElementById(“Stop”).value = 0;
}

