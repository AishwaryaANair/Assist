<?php
include('connection.php');
session_start();

$db = OpenCon();

if (isset($_POST['voicelogin'])) {
    $errors = array();
    // receive all input values from the form
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password_1 = mysqli_real_escape_string($db, $_POST['password']);

// form validation: ensure that the form is correctly filled ...
// by adding (array_push()) corresponding error unto $errors array
    if (empty($email)) { array_push($errors, "Email is required"); }
    if (empty($password_1)) { array_push($errors, "Password is required"); }

    if (empty($errors)) {
        $_SESSION['email'] = $email;
        header('location:three-box.php');
    }
    else {
        foreach ($errors as $error){
            echo '<p>'.$error.'</p>';
        }
 
    }
}
?>