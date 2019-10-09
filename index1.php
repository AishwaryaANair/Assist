<?php
include 'connection.php';

$conn = OpenCon();
echo "Connected Successfully";

if(isset($_POST['distance']))
{
    $email = $_POST['email'];
    $userId = "SELECT identification from user where email in ($email)";
    $distance=$_POST['distance'];
    echo "$distance";
    $SQL = "INSERT INTO distance (distance,userFK) VALUES ('$distance',)";
    mysqli_query($conn,$SQL);

    $lat=$_POST['lat'];
    $long=$_POST['long'];
    echo "$lat";
    echo "$long";
    $SQL = "INSERT INTO location (lat,longitude) VALUES ('$lat','$long')";
    mysqli_query($conn,$SQL);

    CloseCon($conn);

}
?>
