<?php 
  include('connection.php');
  session_start();
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://fonts.googleapis.com/css?family=Oswald&display=swap" rel="stylesheet">

<style>
html {
    width: 100%;
    height: 100%;
    margin: 0;
    padding: 0;
}
body {
  height:100%;
  background-image: linear-gradient(rgb(51, 196, 63), rgb(17, 114, 194)); 
  background-repeat:  no-repeat;
}
.rcorner1 {
  margin: 1rem;
  border-radius: 25px;
  background: white;
  padding: 20px;
  width: auto;
  height: 40%;
  text-align: center;
}

a{
  font-family: 'Oswald', Arial;
  font-size: 50px;
  color:black;
  text-align: center;
  text-decoration: none;
  display: block;
  padding: 10px;
}
</style>
</head>
<body>

  <div class="rcorner1">
    <a href = 'check.php'>VOICE</a>
  </div>
  <div class="rcorner1">
    <a href="loginiot.php">NON-VOICE</a> 
  </div>
</body>
<script src="https://code.responsivevoice.org/responsivevoice.js?key=GR3vv3Qk"></script>
<script>
    setTimeout(responsiveVoice.speak("Click on top for voice navigation"),15000);
</script>
</html>