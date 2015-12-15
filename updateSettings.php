<?php
include('session.php');
$userid = $_SESSION['userid'];
echo $userid;
if (isset($_POST['submit'])) {
    if (empty($_POST['username']) || empty($_POST['password'])) {
        $error = "Username or Password is empty";
    } else {
        $connection = new mysqli("eu-cdbr-azure-west-c.cloudapp.net", "b0b05a48637b3e", "2d0628d7", "wb1306507");
        $newUsername = $_POST['username'];
//        $password = $_POST['password'];
//        $email = $_POST['email'];
        echo "Before sql";
        $query = mysqli_query($connection, "UPDATE users SET username='$newUsername' WHERE userid='$userid'");
        echo "After sql";
        $result = mysqli_num_rows($query);
        if ($result == 1) {
            $_SESSION['login_user']=$newUsername; // Initializing Session
        }
        header("location: admin.php"); // Redirecting To Other Page
        $connection->close(); // Closing Connection
    }
}
