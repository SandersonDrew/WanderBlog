<?php
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
    <b id="profile"><a href="profile.php">Click here to go to your profile page</a></b>
    <b id="logout"><a href="logout.php">Log Out</a></b>
    <b id="brian"><a href="brianslonelypage.php">All by myself</a></b>
    <b id="newAdventure"><a href="createNewAdventure.php">Create New Adventure</a></b>
</div>
</body>
</html>