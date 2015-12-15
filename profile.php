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

<?php
$connection = new mysqli("eu-cdbr-azure-west-c.cloudapp.net", "b0b05a48637b3e", "2d0628d7", "wb1306507");
$userid = $_SESSION['userid'];
?>


<body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="http://wb1306507.azurewebsites.net/bootstrap-3.3.6-dist/js/bootstrap.min.js"></script>

<nav id="navbar">
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Logo goes here</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li><a href="#">Upload</a></li>
                    <li><a href="profile.php">Profile</a></li>
                </ul>

                <ul class="nav navbar-nav navbar-right">
                    <li><a href="index.php">Log In</a></li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
</nav>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->



<div class="container">
    <div class="row">
        <div class="span4"></div>
        <div class="span4"><img class="center-block img-circle" src="http://placehold.it/150x50&text=Logo"  alt="Profile-Photo" ></div>
        <div class="span4">
        <div class="span4"></div>
    </div>
</div>




<div id="desc" class="container">
    <div class="row">
        <div class="col-md-12">
            <h1 id="userName">
                <?php
                $sql_query = "SELECT displayName FROM users WHERE userid='$userid'";
                $result = $connection->query($sql_query);
                while($row = $result->fetch_assoc()){
                     echo $row['displayName'];
                }
                ?>
            </h1></div>
        <div class="span4">
        </div>
    </div>
</div>

<div id="desc" class="container">
    <div class="row">
        <div class="col-md-12">
            <p>Lorem </p>
        </div>
    </div>
</div>

<div id="top1" class="container">
        <div class="row">
            <div class="col-md-2">

                <img  src="http://placehold.it/150x50&text=Logo"  alt="Profile-Photo" >
                <p>Lorem ipsum dolor sit amet, consectetuer adipicing elit. Aenean commodo ligula eget dolor. Aenean massa.</p>
            </div>

            <div class="col-md-2">
                <img  src="http://placehold.it/150x50&text=Logo"  alt="Profile-Photo" >
                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa.</p>
            </div>

            <div class="col-md-2">
                <img  src="http://placehold.it/150x50&text=Logo"  alt="Profile-Photo" >
                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa.</p>
            </div>

            <div class="col-md-2">
                <img  src="http://placehold.it/150x50&text=Logo"  alt="Profile-Photo" >
                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa.</p>
            </div>

            <div class="col-md-2">
                <img  src="http://placehold.it/150x50&text=Logo"  alt="Profile-Photo" >
                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa.</p>
            </div>

            <div class="col-md-2">
                <img  src="http://placehold.it/150x50&text=Logo"  alt="Profile-Photo" >
                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa.</p>
            </div>

            <div class="col-md-2">
                <img  src="http://placehold.it/150x50&text=Logo"  alt="Profile-Photo" >
                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa.</p>
            </div>

            <div class="col-md-2">
                <img  src="http://placehold.it/150x50&text=Logo"  alt="Profile-Photo" >
                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa.</p>
            </div>

            <div class="col-md-2">
                <img  src="http://placehold.it/150x50&text=Logo"  alt="Profile-Photo" >
                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa.</p>
            </div>

            <div class="col-md-2">
                <img  src="http://placehold.it/150x50&text=Logo"  alt="Profile-Photo" >
                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa.</p>
            </div>

            <div class="col-md-2">
                <img  src="http://placehold.it/150x50&text=Logo"  alt="Profile-Photo" >
                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa.</p>
            </div>

            <div class="col-md-2">
                <img  src="http://placehold.it/150x50&text=Logo"  alt="Profile-Photo" >
                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa.</p>
            </div>




        </div>



        </div>
    </div>







</body>
</html>