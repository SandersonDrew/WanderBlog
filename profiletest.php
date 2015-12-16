<?php
include('session.php');
?>
<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>ProfileTest Page</title>

    <!-- Bootstrap -->
    <link href="http://wb1306507.azurewebsites.net/bootstrap-3.3.6-dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="http://wb1306507.azurewebsites.net/bootstrap-3.3.6-dist/css/extra.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<div id="profile">
    <b id="welcome">Welcome : <i><?php echo $_SESSION['login_user']; ?></i></b>
    <b id="admin"><a href="admin.php">Click here to go to your admin page</a></b>
    <b id="profile"><a href="profile.php">Click here to go to your profile page</a></b>
    <b id="logout"><a href="logout.php">Log Out</a></b>
    <b id="brian"><a href="brianslonelypage.php">All by myself</a></b>
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8" style="border:1px solid #000;">
            <p><h4>Update Settings</h4>

            <form action="updateSettings.php" method="post">
                <h6>Name: </h6> <input type="text" name="Text" placeholder="Adventure Text">
                <h6>Email: </h6><input type="text" name="Location" placeholder="Location">
                <input type="submit" value="submit">
            </form>
            <br>
        </div>
        <div class="col-md-2"></div>
    </div>
</div>
</body>
</html>