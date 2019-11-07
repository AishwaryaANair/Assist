<?php

	require('index1.php');
	/* Database connection settings */
	session_start();
	$conn = OpenCon();
	$query = "SELECT lat,longitude FROM location group by `lat`,`longitude`";
	#$sql="SELECT * FROM mytable WHERE DATE_FORMAT(evedate, '%m/%d/%Y') BETWEEN '" . $from_date . "' AND  '" . $to_date . "'";
	$result = $conn->query($query) or die('data selection for google map failed: ' . $conn->error);

	while( $row = $result->fetch_assoc() ){
		$longitude = $row['longitude']; 
		$latitude = $row['lat'];
		/* Each row is added as a new array */
		$locations[]=array( 'lat'=>$latitude, 'lng'=>$longitude );
	}
		
	
?>
<!DOCTYPE html>
<html>
<title>ASSIST</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body,h1,h2,h3,h4,h5,h6 {font-family: "Raleway", sans-serif}

body, html {
  height: 100%;
  line-height: 1.8;
}
nav {
	display: block;
}
body {
  min-height:100%;
  background-position: center;
  background-size: cover;
  background-image: url("../images/location.jpg");
  opacity:1;

}
#map{
	margin: 2rem;
	padding: 2rem;
	max-width: 100%;
	height:80%;
	position: unset;
}
header {
	margin: 4rem 4rem 0rem 4rem;
	padding: 1rem;
}
p{
	font-family: 'Raleway', sans-serif;
	color:white;
	font-size: 3rem;
	opacity: 1;
	display: block;
	margin: 0rem;
	position: relative;

}
.w3-bar .w3-button {
  padding: 16px;
  
}
</style>
<body>
<!-- Navbar (sit on top) -->
<div class="w3-top">
    <div class="w3-bar w3-white w3-card" id="myNavbar">
      <a href="admin.php" class="w3-bar-item w3-button w3-wide">ASSIST</a>
      <!-- Right-sided navbar links -->
      <div class="w3-right w3-hide-small">
        <a href="analysis.php" onclick="w3_close()" class="w3-bar-item w3-button">ANALYSIS</a>
        <a href="#" onclick="w3_close()" class="w3-bar-item w3-button">FREQUENT LOCATIONS</a>
        <a href="#" class="w3-bar-item w3-button"><i class="fa fa-user"></i>HELP</a>
        <a href="ABOUT-iot.html" class="w3-bar-item w3-button">ABOUT</a>
        <a href="#" class="w3-bar-item w3-button"><i class="fa fa-envelope"></i> CONTACT</a>
        <a href="../logout.php" class="w3-bar-item w3-button"><i class="fa fa-envelope"></i>Logout</a>
      </div>
      <!-- Hide right-floated links on small screens and replace them with a menu icon -->
  
      <a href="javascript:void(0)" class="w3-bar-item w3-button w3-right w3-hide-large w3-hide-medium" onclick="w3_open()">
        <i class="fa fa-bars"></i>
      </a>
    </div>
  </div>
  
  <!-- Sidebar on small screens when clicking the menu icon -->
  <nav class="w3-sidebar w3-bar-block w3-black w3-card w3-animate-left w3-hide-medium w3-hide-large" style="display:none" id="mySidebar">
	<a href="javascript:void(0)" onclick="w3_close()" class="w3-bar-item w3-button w3-large w3-padding-16">Close ×</a>
    <a href="analysis.php" onclick="w3_close()" class="w3-bar-item w3-button">ANALYSIS</a>
    <a href="#" onclick="w3_close()" class="w3-bar-item w3-button">FREQUENT LOCATIONS</a>
    <a href="#work" onclick="w3_close()" class="w3-bar-item w3-button">HELP</a>
    <a href="ABOUT-iot.html" onclick="w3_close()" class="w3-bar-item w3-button">ABOUT</a>
	<a href="#contact" onclick="w3_close()" class="w3-bar-item w3-button">CONTACT</a>
  <a href="../logout.php" class="w3-bar-item w3-button"><i class="fa fa-envelope"></i>Logout</a>
	
  </nav>
  
  	<header><p style="text-align:center">  frequent location </p></header>
	<!-- this div will hold your map -->
	<div id="map"></div>

	<!-- this div will hold your store info -->
	<div id="info_div"></div>

	<script>
function initMap() {
        var myLatLng = {lat: 19.045, lng: 72.8996};

        var map = new google.maps.Map(document.getElementById('map'), {
          center: myLatLng,
          scrollwheel: true,
          zoom: 10,
          mapTypeId: google.maps.MapTypeId.SATELITE
         });

        <?php for($i=0;$i<sizeof($locations);$i++)
        { ?>
         var marker = new google.maps.Marker({
          map: map,
          position: {lat: <?php echo $locations[$i]['lat']?>,lng: <?php echo $locations[$i]['lng']?>},
          title: 'Locations'
        });
        <?php } ?>
       }

    
</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAWfVDVuFU8wxpEGEZK7k8divVf7ElRjXU&callback=initMap" async defer></script>

</body>
</html>