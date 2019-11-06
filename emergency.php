<?php

	$query = "SELECT lat,longitude FROM location where timeUpdated = (SELECT MAX(timeUpdated) FROM location) LIMIT 1";
	$result = $conn->query($query) or die('data selection for google map failed: ' . $conn->error);

 	while ($row = mysqli_fetch_array($result)) {

		$latitudes[] = $row['lat'];
		$longitudes[] = $row['longitude'];
	}
	
	$query = "SELECT email FROM location where timeUpdated = (SELECT MAX(timeUpdated) FROM location) LIMIT 1";
	
//$to_email = ;
	$subject ='EMERGENCY';
	$htmlContent='
	<!DOCTYPE html>
	
	<html lang="en" >

	<head>
		<meta charset="UTF-8">
		<title>Emergency</title>
	</head>

	<body>

		
	<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
	<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width">

	<!-- For development, pass document through inliner -->
	<style type="text/css">


	* {
		margin: 0;
		padding: 0;
		font-size: 100%;
		font-family: "Open Sans", Helvetica, Arial, sans-serif;
		line-height: 1.65;
	}

	img {
		max-width: 100%;
		margin: 0 auto;
		display: block;
	}

	body, .body-wrap {
		width: 97% !important;
		margin: 0 auto;
		height: 100%;
		background: #efefef;
		-webkit-font-smoothing: antialiased;
		-webkit-text-size-adjust: none;
	}

	a {
		color: #3ab795;
		text-decoration: none;
	}

	.text-center {
		text-align: center;
	}

	.text-right {
		text-align: right;
	}

	.text-left {
		text-align: left;
	}

	.button a {
		display: inline-block;
		color: #ffffff;
		background: #3ab795;
		border: 2px solid #3ab795;
		padding: 9px 20px 10px;
		text-transform: uppercase;
		font-size: 12px;
		font-weight: normal;
	}
		
	.highlight {
		font-size: 22px;
		font-weight: bold;
	}

	h1, h2, h3, h4, h5, h6 {
		margin-bottom: 20px;
		line-height: 1.25;
	}

	h1 {
		font-size: 32px;
	}

	h2 {
		font-size: 28px;
	}

	h3 {
		font-size: 24px;
	}

	h4 {
		font-size: 20px;
	}

	h5 {
		font-size: 16px;
	}

	p, ul, ol {
		font-size: 14px;
		font-weight: normal;
		margin-bottom: 20px;
	}

	p.footnote {
		font-size: 10px;
		margin-top: 5px;
	}

	.container {
		display: block !important;
		clear: both !important;
		margin: 20px auto 0 !important;
		max-width: 580px !important;
	}

	.container table {
		width: 100% !important;
		border-collapse: collapse;
	}

	.container .preheader {
		font-size: 12px;
		padding: 5px 5px 5px 5px;
		color: #adadad;
		text-align: center;
	}

	.container .masthead {
		padding: 80px 0;
		background: #2a333b;
		color: white;
		background-image: url("https://s3.ca-central-1.amazonaws.com/hover-email/hover_logo_75x21.png");
		background-repeat: no-repeat;
		background-position: center 15px;
		border-radius: 10px 10px 0 0;
	}

	.container .masthead h1 {
		margin: 0 auto !important;
		max-width: 90%;
	}

	.container .content {
		background: white;
		padding: 20px 20px 0 20px;
	}

	.container .content.footer {
		background: none; 
		padding-top: 0;
	}

	.container .content.footer p {
		margin-bottom: 0;
		color: #888;
		text-align: center;
		font-size: 12px;
	}

	.container .content.footer a {
		color: #888;
		text-decoration: none;
		font-weight: bold;
		}
	</style>
	</head>


	<body style="width:97% !important;margin-top:0;margin-bottom:0;margin-right:auto;margin-left:auto;height:100%;background-color:#efefef;background-image:none;background-repeat:repeat;background-position:top left;background-attachment:scroll;-webkit-font-smoothing:antialiased;-webkit-text-size-adjust:none;">
	<h1>
	<script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script></body>
	</html>';
	$headers = "MIME-Version: 1.0" . "\r\n"; 
	$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n"; 
		
	// Additional headers 
	//$headers .= 'From: parsnani71@gmail.com' .'<'.$from.'>' . "\r\n"; 
	$headers .= 'Cc: 2017.aishwarya.nair@ves.ac.in' . "\r\n"; 
	$headers .= 'Bcc:'.$to_email . "\r\n"; 

	// $headers = 'From: parsnani71@gmail.com';
	mail($to_email,$subject,$htmlContent,$headers);

	
		
?>