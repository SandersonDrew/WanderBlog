<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/profile.css">
    <link rel="stylesheet" type="text/css" href="css/navbar.css">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <!-- Bootstrap -->
    <link href="http://wb1306507.azurewebsites.net/bootstrap-3.3.6-dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="http://wb1306507.azurewebsites.net/bootstrap-3.3.6-dist/css/extra.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <!-- Bootstrap -->
    <link href="http://wb1306507.azurewebsites.net/bootstrap-3.3.6-dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="http://wb1306507.azurewebsites.net/bootstrap-3.3.6-dist/css/extra.css" rel="stylesheet">

    <title>Welcome to WanderBlog</title>
    <style type="text/css">
        .adventure p{
            display: inline-block;
            margin-left: auto;
            margin-right:auto;
            bottom: 10px;
            margin-left: auto;
            margin-right:auto;
        }
        .adventure{
            text-align: center;
            overflow: auto;
        }
        .adventure img{
            display: inline-block;
            width: 60px;
            height: 60px;

        }
    </style>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/jquery-ui.min.js"></script>
</head>
<body onload="Slider();">

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
                    <li><a href="newAdventure.php">Upload</a></li>
                    <li><a href="profile.php">Profile</a></li>
                    <li><a href="admin.php">Settings</a></li>
                </ul>

                <?php
                if($_SESSION['login_user']!= null){
                    $name = "Logged in as " . $_SESSION['displayName'];
                }
                ?>
                <ul class="nav navbar-nav navbar-right">

                    <li id="logged-in">
                        <?php
                        if($_SESSION['login_user']!= null){
                            echo $name;
                        }
                        else{

                            require_once("loginpopup.php");

                        }
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
<?php
genDivs();
function genDivs(){
    $connection = new mysqli("eu-cdbr-azure-west-c.cloudapp.net", "b0b05a48637b3e", "2d0628d7", "wb1306507");
    $query = mysqli_query($connection,"SELECT username FROM users WHERE verified=0");
    $advname = "Test";
    $authname = "John Cena";
    $advdate = "11/11/2011";

    for ($i = 0; $i < 5; $i++) {
        //$row = mysqli_fetch_array($query, MYSQLI_NUM);
        echo '<div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class = "adventure">
                <h1>'.$advname.'</h1>
                    <img id="1" src ="http://www.cats.org.uk/uploads/branches/211/5507692-cat-m.jpg" border="0" alt = "test">
                    <img id="2" src ="http://www.cats.org.uk/uploads/images/cats/110585_0.png" border="0" alt = "test">
                    <img id="3" src ="http://www.cats.org.uk/uploads/branches/211/adoption%20fee.png" border="0" alt = "test">
                    <img id="4" src ="http://www.aaj.tv/wp-content/uploads/2015/08/bullet_cat1.jpg" border="0" alt = "test">
                <div class="info">
                    <p>'.$authname.'</p>
                    <p>'.$advdate.'</p>
                    <p>Click Here to Upvote: </p>
                    <img id="up" src = "http://i68.tinypic.com/dh7giv.jpg">
                    <p>Click Here to Downvote: </p>
                    <img id="down" src = "http://i68.tinypic.com/2r6pq1g.jpg">
                </div>
                <div class = "adventure">
                    <div class="col-md-1"></div>
                    <div class="col-md-10">
                        <p><?php echo $text?></p>
                    </div>
                    <div class="col-md-1"></div>
                </div>
            </div>
        </div>
        <div class="col-md-2"></div>
    </div>';
    }
}
?>
</body>
</html>
