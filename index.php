<?php
if(isset($_SESSION['login_user'])){
    header("location: profiletest.php");
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>WanderBlog Login</title>
        <link href="style.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" type="text/css" href="</css" href="css/navbar.css">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Profile</title>

        <!-- Bootstrap -->
        <link href="http://wb1306507.azurewebsites.net/bootstrap-3.3.6-dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="http://wb1306507.azurewebsites.net/bootstrap-3.3.6-dist/css/extra.css" rel="stylesheet">

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>--->
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

        </head>
        <body>
        <nav id="navbar">
            <nav class="navbar navbar-inverse">
                <div class="container-fluid">
                    <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.php"><img id="sitelogo" src="/Photos/logoback.png" height="50" width="90" alt="Logo" ></a>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li><a href="#">Upload</a></li>
                        <li><a href="profile.php">Profile</a></li>
                        <li><a href="admin.php">Settings</a></li>
                        <li><a href="newAdventure.php">Create New Adventure</a></li>
                    </ul>
                    <?php
                    if($_SESSION['login_user']!= null){
                        $name = "Logged in as " . $_SESSION['displayName'];

                    }
                    ?>
                    <ul id = "name" class="nav navbar-nav navbar-right">

                        <li id="name"><?php if($_SESSION['login_user']!= null){
                                echo $name;
                            }
                            else{require_once("loginpopup.php");}
                            ?></li>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>
    </nav>
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="http://wb1306507.azurewebsites.net/bootstrap-3.3.6-dist/js/bootstrap.min.js"></script>
    </body>
</html>
