<?php
include 'connection.php';

$conn = OpenCon();
echo "Connected Successfully";

if(isset($_POST['distance']))
{
    $distance=$_POST['distance'];
    echo "$distance";
    $SQL = "INSERT INTO distance (distance) VALUES ('$distance')";
    mysqli_query($conn,$SQL);

    CloseCon($conn);

}

if(isset($_POST['lat']))
{
    $lat=$_POST['lat'];
    $long=$_POST['long'];
    echo "$lat";
    echo "$long";
    $SQL = "INSERT INTO location (lat,long) VALUES ('$lat','$long')";
    mysqli_query($conn,$SQL);

    CloseCon($conn);

}
?>
