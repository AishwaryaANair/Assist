<?php 

    include('connection.php');
    session_start();

// initializing variables
    $username = "";
    $email    = "";
    $errors = array(); 

    // connect to the database
    $db = OpenCon();

    // REGISTER USER
    if (isset($_POST['unreg_user'])) {
    // receive all input values from the form
        $email = mysqli_real_escape_string($db, $_POST['email']);
        $password_1 = mysqli_real_escape_string($db, $_POST['password']);
        $password_2 = mysqli_real_escape_string($db, $_POST['password2']);

    // form validation: ensure that the form is correctly filled ...
    // by adding (array_push()) corresponding error unto $errors array
        if (empty($email)) { array_push($errors, "Email is required"); }
        if (empty($password_1)) { array_push($errors, "Password is required"); }
        if ($password_1 != $password_2) {
            array_push($errors, "The two passwords do not match");
        }

    // first check the database to make sure 
    // a user does not already exist with the same username and/or email
        $user_check_query = "SELECT * FROM users WHERE email='$email' LIMIT 1";
        $result = mysqli_query($db, $user_check_query);
        $user = mysqli_fetch_assoc($result);
    
        if ($user) { // if user exists

            if ($user['email'] === $email) {
            array_push($errors, "email already exists");
            }
        }

    // Finally, register user if there are no errors in the form
        if (count($errors) == 0) {
            $password = md5($password_1);//encrypt the password before saving in the database

            $query = "INSERT INTO user (email, password) VALUES('$email', '$password')";
            $db->query($query) or die('Result error ' . $db->error);
            
            $_SESSION['success'] = "You are now logged in";
            header('location: mapiot.php');
        }
    }

// ... 

    if(isset($_POST['reg_user'])){
        $email = '';
        $password = '';
        $errors = array(); 
        $email=$_POST['email'];
        $password = md5($_POST['password']);
        
        $sql="select * from user where email='".$email."'AND password='".$password."' limit 1";
        $result = $db->query($sql) or die('Result error ' . $db->error);
        
        
        if($result){
            while ($row = mysqli_fetch_array($result)) {

                if ($row['isadmin'] == 0) {
                    header('location: mapiot.php');
                }
                else {
                    header('location: ./admin/admin.php');
                    
                }
            }
        }
        else{
            array_push($errors, "incorrect email");
            exit();
        }
    }
    
?>