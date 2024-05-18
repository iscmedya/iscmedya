
<!DOCTYPE html>
<html>
<head>
<script>
function startTime() {
    var today=new Date();
    var h=today.getHours();
    var m=today.getMinutes();
    var s=today.getSeconds();
    m = checkTime(m);
    s = checkTime(s);
    document.getElementById('txt').innerHTML = h+":"+m+":"+s;
    var t = setTimeout(function(){startTime()},500);
}

function checkTime(i) {
    if (i<10) {i = "0" + i};  // add zero in front of numbers < 10
    return i;
}
</script>
</head>

<body onLoad="startTime()">

<div id="txt"></div>
<script type="text/javascript">
var sc_project=11943538; 
var sc_invisible=1; 
var sc_security="69542a32"; 
</script>
<script type="text/javascript"
src="http://statcounter.com/counter/counter.js"
async></script>
<noscript><div class="statcounter"><img
class="statcounter"
src="//c.statcounter.com/11943538/0/69542a32/1/" alt="ir"></div></noscript>






</body>



</html>