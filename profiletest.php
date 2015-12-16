<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include('session.php');
?>
<!DOCTYPE html>
<html>
<head>
    <title>Your Home Page</title>
    <link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>
<div id="profile">
    <b id="welcome">Welcome : <i><?php echo $_SESSION['login_user']; ?></i></b>
    <b id="admin"><a href="admin.php">Click here to go to your admin page</a></b>
    <b id="logout"><a href="logout.php">Log Out</a></b>
</div>
</body>
</html>