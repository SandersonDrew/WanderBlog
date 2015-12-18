<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start(); // Starting Session
$error=''; // Variable To Store Error Message
if (isset($_POST['submit'])) {
    if (empty($_POST['username']) || empty($_POST['password'])) {
        $error = "Username or Password is empty";
        echo "Hi";
        echo $error;
    }
    else
    {
// Define $username and $password
        $username=$_POST['username'];
        $password=$_POST['password'];
// Establishing Connection with Server by passing server_name, user_id and password as a parameter
// Selecting Database
        $connection = new mysqli("eu-cdbr-azure-west-c.cloudapp.net", "b0b05a48637b3e", "2d0628d7", "wb1306507");
        if ($connection->connect_error) {
            die("Connection failed: " . $connection->connect_error);
        }
// To protect MySQL injection for Security purpose
        $username = stripslashes($username);
        $password = stripslashes($password);
        $password = crypt($password,'bananafacemcghee');

// SQL query to fetch information of registered users and finds user match.
        $query = mysqli_query($connection,"SELECT * FROM users WHERE username='$username'");
        $result = mysqli_num_rows($query);
        echo $result;
        if ($result == 1) {
            $known = getval($connection,"SELECT password FROM users WHERE username='$username'");
            if(strcasecmp($known, $password)==0){
                $userid = getval($connection,"SELECT userid FROM users WHERE username='$username'");
                $displayName = getval($connection,"SELECT displayname FROM users WHERE username='$username'");
                $email = getval($connection,"SELECT email FROM users WHERE username='$username'");
                $permLevel= getval($connection,"SELECT permissionlevel FROM users WHERE username='$username'");
                $_SESSION['login_user']=$username; // Initializing Session
                $_SESSION['userid'] = $userid;
                $_SESSION['email'] = $email;
                $_SESSION['displayName'] = $displayName;
                $_SESSION['permLevel'] = $permLevel;

                //header("location: profile.php"); // Redirecting To Other Page
            }
        } else {
            header("location:index.php");
        }
        $connection->close(); // Closing Connection
    }
}
else{
    echo "Hi";
}
function getval($mysqli, $sql) {
    $result = $mysqli->query($sql);
    $value = $result->fetch_array(MYSQLI_NUM);
    return is_array($value) ? $value[0] : "";
}
?>