<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Admin Settings Page</title>

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
<div class="container">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8" style="border:1px solid #000;">
            <div>
                <img src="http://placehold.it/150x150"
                     style="max-width: 100%; max-height: 100%; display:block; margin:auto;" alt="ProfilePic"/>
            </div>
        </div>
        <div class="col-md-2"></div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8" style="border:1px solid #000;">
            <form action="updatesettings.php">
                <input type="submit" value="Update Profile Picture" align="center">
            </form>
        </div>
        <div class="col-md-2"></div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8" style="border:1px solid #000;">
            <p><h4>Author Name goes here</h4>
        </div>
        <div class="col-md-2"></div>
    </div>

    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8" style="border:1px solid #000;">
            <p><h4>Update Settings</h4>

            <p><h5>Update Name</h5>

            <form action="updatesettings.php">
                <h6>Name: </h6> <input type="text" name="name">
                <input type="submit" value="Submit">
            </form>
            <p><h5>Update Email</h5>

            <form action="updatesettings.php">
                <h6>Email: </h6><input type="text" name="email">
                <input type="submit" value="Submit">
            </form>
            <p><h5>Update Password</h5>

            <form action="updatesettings.php">
                <h6>Password: </h6><input type="text" name="pword">
                <input type="submit" value="Submit">
            </form>
            <br>
        </div>
        <div class="col-md-2"></div>
    </div>
</div>
<?php
function genDivs($numNewUsers)
{
    for ($i = 0; $i < $numNewUsers; $i++) {
        echo '<div class="container">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-1" style="border:1px solid #000;">
            <img src="http://placehold.it/60x60">
        </div>
        <div class="col-md-5" style="height: 62px; border:1px solid #000;">
            <h6> New User 1 </h6>
        </div>
        <div class="col-md-1" style="border:1px solid #000;">
            <img src="http://placehold.it/60x60" alt="Yes">
        </div>
        <div class="col-md-1" style="border:1px solid #000;">
            <img src="http://placehold.it/60x60" alt="No">
        </div>
        <div class="col-md-2"></div>
    </div>
</div>';
    }
}
genDivs(5);
?>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="http://wb1306507.azurewebsites.net/bootstrap-3.3.6-dist/js/bootstrap.min.js"></script>
</body>

</html>