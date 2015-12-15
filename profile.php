<?php
include('http://wb1306507.azurewebsites.net/session.php');
?>
<!DOCTYPE html>
<html>
<head>
    <title>Your Home Page</title>
    <link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>
<div id="profile">
    <b id="welcome">Welcome : <i><?php echo $login_session; ?></i></b>
    <b id="logout"><a href="http://wb1306507.azurewebsites.net/logout.php">Log Out</a></b>
</div>
</body>
</html>