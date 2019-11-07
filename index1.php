<?php
    include ('connection.php');

    $conn = OpenCon();
    #echo "Connected Successfully";

    if(isset($_POST['lat']))
    {

        $lat=$_POST['lat'];
        $long=$_POST['long'];
        echo "$lat";
        echo "$long";
        $SQL = "INSERT INTO location (lat,longitude) VALUES ('$lat','$long')";
        mysqli_query($conn,$SQL);

        CloseCon($conn);

    }
?>
