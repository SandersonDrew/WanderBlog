<?php
include('session.php');
$userid = $_SESSION['userid'];


    $connection = new mysqli("eu-cdbr-azure-west-c.cloudapp.net", "b0b05a48637b3e", "2d0628d7", "wb1306507");
    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }
if(empty($_POST['name'])){
    $query = "SELECT displayName FROM users WHERE userid='$userid'";
    $newUsername = $connection->query($query);
}
if(empty($_POST['email'])){
    $query = "SELECT email FROM users WHERE userid='$userid'";
    $email = $connection->query($query);
}
if(empty($_POST['bio'])){
    $query = "SELECT bio FROM users WHERE userid='$userid'";
    $bio = $connection->query($query);
}
    $newUsername = $_POST['name'];
    $email = $_POST['email'];
    $bio = $_POST['bio'];
    $query = "UPDATE users SET displayName='$newUsername', email = '$email', bio='$bio' WHERE userid = $userid";
    $connection->query($query);
    $_SESSION['displayName']=$newUsername; // Initializing Session
    header("location: admin.php"); // Redirecting To Other Page
    $connection->close(); // Closing Connection