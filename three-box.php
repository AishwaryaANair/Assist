<?php
session_start()
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://fonts.googleapis.com/css?family=Oswald&display=swap" rel="stylesheet">
<style>
* {
box-sizing: border-box;
}
/* Create three equal columns that floats next to each other */
.column {
border-radius: 35px;
border: 2px solid black;
float: left;
width: 100%;
padding: 50px;
height: 400px; /* Should be removed. Only for demonstration */
margin-top: 30px;
text-align: center;
font-family: 'Oswald', Arial;
font-size: 40px;
}
.column1 {
border-radius: 35px;
border: 2px solid black;
float: left;
width: 100%;
padding: 50px;
height: 400px; /* Should be removed. Only for demonstration */
margin-top: 30px;
text-align: center;
font-family: 'Oswald', Arial;
font-size: 40px;
}
a {
text-decoration: none;
color:black
}
/* Clear floats after the columns */
.row:after {
content: "";
display: table;
clear: both;
}
</style>
<script>
	function noBack() { window.history.forward(); }

</HEAD>
<BODY onload="noBack();" 
	onpageshow="if (event.persisted) noBack();" onunload="">
</script>
<body>
<div class="row">
<div class="column" style="background-color:white;">
<a href="start_nav.php"> <h1>CHECK LOCATION</h1> </a>
</div>
</div>
<div class="row1" style="background-color:white;">
<div class="column1" style="background-color:white;">
<a href="emergency.php" > <h1>EMERGENCY</h1> </a>
</div>
</div>
</body>
<script src="https://code.responsivevoice.org/responsivevoice.js?key=GR3vv3Qk"></script>
<script>
    setTimeout(responsiveVoice.speak("Click on top for location click bottom for emergency"),15000);
</script>
</html>