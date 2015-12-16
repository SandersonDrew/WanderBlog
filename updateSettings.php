<?php
include('session.php');
$userid = $_SESSION['userid'];


    $connection = new mysqli("eu-cdbr-azure-west-c.cloudapp.net", "b0b05a48637b3e", "2d0628d7", "wb1306507");
    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }
    $newUsername = $_POST['name'];
    $email = $_POST['email'];
    $query = "UPDATE users SET displayName='$newUsername', email = '$email' WHERE userid = $userid";
    $connection->query($query);
    $_SESSION['displayName']=$newUsername; // Initializing Session
    header("location: admin.php"); // Redirecting To Other Page
    $connection->close(); // Closing Connection