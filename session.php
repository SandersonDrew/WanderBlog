<?php
// Selecting Database
$connection = new mysqli("eu-cdbr-azure-west-c.cloudapp.net", "b0b05a48637b3e", "2d0628d7", "wb1306507");
session_start();// Starting Session
// Storing Session

if(is_null($_SESSION['login_user'])){
    $_SESSION['login_user'] = "null";
}else{
    // SQL Query To Fetch Complete Information Of User
    $ses_sql=mysqli_query($connection, "select username from users where username='$user_check'");
    $row = mysqli_fetch_assoc($ses_sql);
    $login_session =$row['username'];
    $user_check=$_SESSION['login_user'];
}
header('Location: index.php'); // Redirecting To Home Page
?>