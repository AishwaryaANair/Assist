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
?>
