<?php
include('session.php');
$userid = $_SESSION['userid'];
echo $userid;

    $connection = new mysqli("eu-cdbr-azure-west-c.cloudapp.net", "b0b05a48637b3e", "2d0628d7", "wb1306507");
    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }
    echo "Connected successfully";
    $newUsername = $_POST['name'];
    $password = $_POST['pword'];
    $email = $_POST['email'];
    $query = "UPDATE users SET username='$newUsername', password = '$password', email = '$email' WHERE userid = $userid";
    $connection->query($query);
    $_SESSION['login_user']=$newUsername; // Initializing Session

header("location: admin.php"); // Redirecting To Other Page
    $connection->close(); // Closing Connection