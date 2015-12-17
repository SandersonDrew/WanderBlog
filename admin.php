<?php
include('session.php');
if($_SESSION['permLevel'] == 0){
    header('location: index.php');
}
$displayName = $_SESSION['displayName'];
$email = $_SESSION['email'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Settings Page</title>

    <!-- Bootstrap -->
    <link href="http://wb1306507.azurewebsites.net/bootstrap-3.3.6-dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="http://wb1306507.azurewebsites.net/bootstrap-3.3.6-dist/css/extra.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style type="text/css">
        div#submitForm input {
            background: url("http://placehold.it/60x60") no-repeat scroll 0 0 transparent;
            color: #000000;
            cursor: pointer;
            font-weight: bold;
            height: 20px;
            padding-bottom: 2px;
            width: 75px;
        }
    </style>
</head>

<body>
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
                <a class="navbar-brand" href="index.php"><img  src="\Photos\logoback.png" height="40" width="80" alt="Logo" ></a>
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
                }else{
                    $name = "Log In";
                }
                ?>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="index.php"><?php
                            echo $name;
                            ?></a></li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
</nav>
<div class="container">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8" style="border:1px solid #000;">
            <div>
                <img src="http://placehold.it/150x150" style="max-width: 100%; max-height: 100%; display:block; margin:auto;" alt="ProfilePic"/>
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
                <input type="submit" value="Update Profile Picture" style="display: block; margin: 0 auto">
            </form>
        </div>
        <div class="col-md-2"></div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8" style="border:1px solid #000;">
            <p><h4><?php echo $displayName?></h4>
        </div>
        <div class="col-md-2"></div>
    </div>

    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8" style="border:1px solid #000;">
            <p><h4>Update Settings</h4>

            <form action="updateSettings.php" method="post">
                <h6>Display Name: </h6> <input type="text" name="name" value="<?php echo $displayName;?>">
                <h6>Email: </h6><input type="text" name="email" value="<?php echo $email ?>">
                <input type="submit" value="submit">
            </form>
            <br>
        </div>
        <div class="col-md-2"></div>
    </div>
</div>
<b id="logout"><a href="logout.php">Log Out</a></b>
<?php
if($_SESSION['permLevel'] > 2){
    genDivs();
}
?>

<?php
function genDivs(){
    $connection = new mysqli("eu-cdbr-azure-west-c.cloudapp.net", "b0b05a48637b3e", "2d0628d7", "wb1306507");
    $query = mysqli_query($connection,"SELECT username FROM users WHERE verified=0");
    $result = mysqli_num_rows($query);
    for ($i = 0; $i < $result; $i++) {
        $row = mysqli_fetch_array($query, MYSQLI_NUM);
        echo '<div class="container">
        <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-1" style="border:1px solid #000;">
            <img src="http://placehold.it/60x60">
        </div>
        <div class="col-md-5" style="height: 62px; border:1px solid #000;">
            <form action="profile.php" method="get">
                <input type="submit" name="username" value="'.$row[0].'" />
            </form>
        </div>
        <div class="col-md-1" style="border:1px solid #000;">
        <div id="submitForm">
        <form action="verifyUser.php" method="post">
            <input type="hidden" name="username" value="'.$row[0].'">
            <input type="submit" name="submit" style="background:url(http://placehold.it/60x60) no-repeat;" />
        </form>
        </div>

        </div>
        <div class="col-md-1" style="border:1px solid #000;">
            <img src="http://placehold.it/60x60" alt="No">
        </div>
        <div class="col-md-2"></div>
    </div>
    </div>';
    }
}
?>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="http://wb1306507.azurewebsites.net/bootstrap-3.3.6-dist/js/bootstrap.min.js"></script>
</body>

</html>