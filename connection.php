<?php
function OpenCon()
{
   $dbhost = "localhost";
   $dbuser = "IOTUser";
   $dbpass = "1q2w3e4r5t";
   $db = "assist";
   $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);
   
   return $conn;
}
 
function CloseCon($conn)
 {
    $conn -> close();
 }

?>