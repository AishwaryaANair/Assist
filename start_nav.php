<?php
session_start();
require('index1.php');
 	$coordinates = array();
 	$latitudes = array();
 	$longitudes = array();


	// Select all the rows in the markers table
	$query = "SELECT lat,longitude FROM location where timeUpdated = (SELECT MAX(timeUpdated) FROM location) LIMIT 1";
	$result = $conn->query($query) or die('data selection for google map failed: ' . $conn->error);

 	while ($row = mysqli_fetch_array($result)) {

		$latitudes[] = $row['lat'];
		$longitudes[] = $row['longitude'];
		$coordinates[] = 'new google.maps.LatLng(' . $row['lat'] .','. $row['longitude'] .'),';
	}

	//remove the comaa ',' from last coordinate
	$lastcount = count($coordinates)-1;
	$coordinates[$lastcount] = trim($coordinates[$lastcount], ",");	

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
#grad1 {
  height:700px;
  background-image: white; 
  background-repeat:  no-repeat;
}
a {
text-decoration: none;
padding: 1rem;
color:black;
display: absolute;
width: 100%;
height: 400px; /* Should be removed. Only for demonstration */
margin-top: 5rem;
text-align: right;
font-family: 'Oswald', Arial;
font-size: 40px;
}
#rcorners2 {
  border-radius: 35px;
  border: 2px solid white;
  padding: 20px; 
  width: auto;
  height:10%;  
  background: white;
 
}
#dist{
  font-family: 'Oswald', Arial;
  font-size: 50px;
  color:black;
  text-align: center;
  margin: 0em;
  display: block;
  padding: 0rem;

}
</style>
</head>
<body id="grad1" style = "min-height:100vh; overflow-y:hidden">

<div id="rcorners2">
  <a id="dist" >Location</a>
</div>
</body>
<script>
  const KEY = "AIzaSyAWfVDVuFU8wxpEGEZK7k8divVf7ElRjXU";
  const LAT = <?php echo $latitudes[0] ?>;
  const LNG = <?php echo $longitudes[0] ?>;
  let url = `https://maps.googleapis.com/maps/api/geocode/json?latlng=${LAT},${LNG}&key=${KEY}`;
  fetch(url)
    .then(response => response.json())
    .then(data => {
      console.log(data);
      let parts = data.results[0].address_components;
      document.body.insertAdjacentHTML(
        "beforeend",
        `<a href = "#">${data.results[0].formatted_address}</a>`
      );
      parts.forEach(part => {
        if (part.types.includes("administrative_area_level_1")) {
          document.body.insertAdjacentHTML(
            "beforeend",
            `<a href = "#"> ${part.long_name}</a>`
          );
        }
        if (part.types.includes("administrative_area_level_3")) {
          document.body.insertAdjacentHTML(
            "beforeend",
            `<a href = "#"> ${part.long_name}</a>`
          );
        }
      });
    })
    .catch(err => console.warn(err.message));
</script>
<script src="https://code.responsivevoice.org/responsivevoice.js?key=GR3vv3Qk"></script>
<script>
    setTimeout(responsiveVoice.speak("location is Collector Colony"),15000);
</script>
</html>
