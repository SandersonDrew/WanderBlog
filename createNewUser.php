<?php
/*ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);*/
session_start(); // Starting Session
$error=''; // Variable To Store Error Message
if (isset($_POST['submit'])) {
    if (empty($_POST['username']) || empty($_POST['password']) || empty($_POST['email'])) {
        $error = "Username, Password or Email is empty";
    }
    else
    {
// Define $username and $password
        $username=$_POST['username'];
        $password=$_POST['password'];
        $email = $_POST['email'];
// Establishing Connection with Server by passing server_name, user_id and password as a parameter
// Selecting Database
        $connection = new mysqli("eu-cdbr-azure-west-c.cloudapp.net", "b0b05a48637b3e", "2d0628d7", "wb1306507");
// To protect MySQL injection for Security purpose
        $username = stripslashes($username);
        $email = stripslashes($email);
        $password = stripslashes($password);
        //$username = mysql_real_escape_string($username);
        // $password = mysql_real_escape_string($password);
// SQL query to insert new user details into database and log them in
        $query = mysqli_query($connection,"SELECT COUNT(*) FROM users WHERE username='$username'");
        if ($query == 0) {
            mysqli_query($connection, "INSERT INTO users(username,password,permissionLevel,verified,email) VALUES('$username', '$password', '0','FALSE','$email') ");
            $userid = getval($connection, "SELECT userid FROM users WHERE username='$username'");
            $_SESSION['login_user']=$userid; // Initializing Session
            header("location: profiletest.php"); // Redirecting To Other Page
        } else {
            $error = "Username is already taken";
        }
        $connection->close(); // Closing Connection
    }
}
function getval($mysqli, $sql) {
    $result = $mysqli->query($sql);
    $value = $result->fetch_array(MYSQLI_NUM);
    return is_array($value) ? $value[0] : "";
}

?>