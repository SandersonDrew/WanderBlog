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
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8" style="border:1px solid #000;">
            <p><h4>Create Adventure</h4>

            <form action="createNewAdventure.php" method="post">
                <h6>Name: </h6> <input type="text" name="Text" placeholder="Please type some text about your adventure">
                <h6>Name: </h6> <input type="text" name="Location" placeholder="Where did the adventure happen?">
                <input type="submit" value="submit">
            </form>
            <br>
        </div>
        <div class="col-md-2"></div>
    </div>
</div>
</body>
</html>