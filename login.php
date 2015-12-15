<?php
session_destroy();
session_start(); // Starting Session
$error=''; // Variable To Store Error Message
if (isset($_POST['submit'])) {
    if (empty($_POST['username']) || empty($_POST['password'])) {
        $error = "Username or Password is empty";
    }
    else
    {
// Define $username and $password
        $username=$_POST['username'];
        $password=$_POST['password'];
// Establishing Connection with Server by passing server_name, user_id and password as a parameter
// Selecting Database
        $db = new mysqli("eu-cdbr-azure-west-c.cloudapp.net", "b0b05a48637b3e", "2d0628d7", "wb1306507");
        //Test Connection to db
        if(mysqli_connect_errno()){
            echo "Failed to connect to DB";
        }

// To protect MySQL injection for Security purpose
        $username = stripslashes($username);
        $password = stripslashes($password);
        //$username = mysql_real_escape_string($username);
       // $password = mysql_real_escape_string($password);
// SQL query to fetch information of registered users and finds user match.
        $query = "SELECT * FROM login WHERE password='$password' AND username='$username'";
        $result = mysqli_query($db,$query);
        if ($result) {
            $_SESSION['login_user']=$username; // Initializing Session
            header("location: http://wb1306507.azurewebsites.net/profiletest.php"); // Redirecting To Other Page
        } else {
            $error = "Username or Password is invalid";
        }
        $connection->close(); // Closing Connection
    }
}
?>