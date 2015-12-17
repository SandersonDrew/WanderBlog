<?php
include('session.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css\profile.css">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Profile</title>

    <!-- Bootstrap -->
    <link href="http://wb1306507.azurewebsites.net/bootstrap-3.3.6-dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8" style="border:1px solid #000;">
        <p><h4>Create New Adventure</h4>
        <form action="createNewAdventure.php" method="post">
            <h6>Text: </h6> <input type="text" name="Text" placeholder="Adventure Text">
            <h6>location: </h6><input type="text" name="location" placeholder="location">
            <input type="submit" name="submit" value="submit">
        </form>
        <br>
    </div>
    <div class="col-md-2"></div>
</div>
