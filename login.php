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
        /**
         * Note that the salt here is randomly generated.
         * Never use a static salt or one that is not randomly generated.
         *
         * For the VAST majority of use-cases, let password_hash generate the salt randomly for you
         */
//        $options = [
//            'cost' => 11
//        ];
//        $password = password_hash($password, PASSWORD_BCRYPT, $options);

        //$username = mysql_real_escape_string($username);
       // $password = mysql_real_escape_string($password);
// SQL query to fetch information of registered users and finds user match.
        $query = mysqli_query($connection,"SELECT * FROM users WHERE password='$password' AND username='$username'");
        $userid = getval($connection,"SELECT userid FROM users WHERE username='$username'");
        $displayName = getval($connection,"SELECT displayName FROM users WHERE userid='$userid'");
        $email = getval($connection,"SELECT email FROM users WHERE userid='$userid'");
        $pword = getval($connection,"SELECT password FROM users WHERE userid='$userid'");
        $permLevel= getval($connection,"SELECT permissionLevel FROM users WHERE userid='$userid'");
        $result = mysqli_num_rows($query);
        if ($result == 1) {
            $_SESSION['login_user']=$username; // Initializing Session
            $_SESSION['userid'] = $userid;
            $_SESSION['email'] = $email;
            $_SESSION['displayName'] = $displayName;
            $_SESSION['permLevel'] = $permLevel;
            header("location: profiletest.php"); // Redirecting To Other Page
        } else {
            $error = "Username or Password is invalid";
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