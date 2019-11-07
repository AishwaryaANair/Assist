<?php
	session_start();
	include('connection.php');
	$conn = OpenCon();
	$query = "SELECT lat,longitude FROM location where timeUpdated = (SELECT MAX(timeUpdated) FROM location) LIMIT 1";
	$result = $conn->query($query) or die('data selection for google map failed: ' . $conn->error);

 	while ($row = mysqli_fetch_array($result)) {

		$latitudes[] = $row['lat'];
		$longitudes[] = $row['longitude'];
	}
	
	$host = "smtp.gmail.com";
	$port = "587";
	$username = 'aishuanair@gmail.com';
	$password = '@bennyboy123';
	$email = $_SESSION['email'];
	$subject = "EMERGENCY!";
	$headers = "MIME-Version: 1.0" . "\r\n";
	$headers .= "From: aishuanair@gmail.com" . "\r\n";
	$headers.="Content-type:text/html;charset=UTF-8". "\r\n";
	$message = "<html>
	<head>
		<title>ASSIST ALERT!</title>
	</head>
	<body>
		<h1> Emergency </h1>
		<p>Help, I'm in trouble. I'm at https://www.google.com/maps/place/".$latitudes[0].",".$longitudes[0]."</p>
	</body>
	</html>";
	if (mail($email, $subject, $message, $headers)) {
	echo "<p>Email sent</p>";
	}else{
	echo "<p>Failed to send email. Please try again later</p>";
	}

	#header('location: three-box.php');
?>