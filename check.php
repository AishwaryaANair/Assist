<?php

if (isset($_SESSION['email'])){
    header('location:three-box.php');

}
else {
    header('location: askcontact.html');
}