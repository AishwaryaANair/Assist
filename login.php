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
    

// Include config file
 
// Define variables and initialize with empty values
$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";
 
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate username
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter a username.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = trim($_POST["username"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = "This username is already taken.";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Validate password
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";     
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Password must have atleast 6 characters.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm password.";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }
    
    // Check input errors before inserting in database
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO users (username, password) VALUES (?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password);
            
            // Set parameters
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                header("location: login.php");
            } else{
                echo "Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($link);
}
?>