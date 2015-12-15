<?php
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
        $connection = new mysqli("eu-cdbr-azure-west-c.cloudapp.net", "b0b05a48637b3e", "2d0628d7", "wb1306507");
// To protect MySQL injection for Security purpose
        $username = stripslashes($username);
        $password = stripslashes($password);
        //$username = mysql_real_escape_string($username);
        // $password = mysql_real_escape_string($password);
// SQL query to insert new user details into database and log them in
        $query = mysqli_query($connection,"SELECT * FROM users WHERE username='$username'");
        $result = mysqli_num_rows($query);
        if ($result == 0) {
            mysqli_query($connection, "INSERT INTO users(username,password,permissionLevel) VALUES($username, $password, 0) ");
            $_SESSION['login_user']=$username; // Initializing Session
            header("location: profiletest.php"); // Redirecting To Other Page
        } else {
            $error = "Username is already taken";
        }
        $connection->close(); // Closing Connection
    }
}
?>