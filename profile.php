<?php
include('session.php');
if($_GET['username'] == null){
    $userid = $_SESSION['userid'];
} else{
    $connection = new mysqli("eu-cdbr-azure-west-c.cloudapp.net", "b0b05a48637b3e", "2d0628d7", "wb1306507");
    $userid = getval($connection,"SELECT userid FROM users WHERE username = '$username'");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/profile.css">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Profile</title>

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
<?php
$connection = new mysqli("eu-cdbr-azure-west-c.cloudapp.net", "b0b05a48637b3e", "2d0628d7", "wb1306507");
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}
?>
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
                <a class="navbar-brand" href="index.php"><img  src="/Photos/wlogo.png" height="40" width="80" alt="Logo" ></a>
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
        <div class="span4"></div>
        <div class="span4"><img class="center-block img-circle" src="http://placehold.it/150x50&text=Logo"  alt="Profile-Photo" ></div>
        <div class="span4"></div>
    </div>
</div>

<div id="desc" class="container">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
                <h1 id="userName">
                    <?php
                    $sql_query = "SELECT displayName FROM users WHERE userid='$userid'";
                    $result = $connection->query($sql_query);
                    while($row = $result->fetch_assoc()){
                        echo $row['displayName'];
                    }
                ?></h1>
        </div>
        <div class="col-md-2"></div>
    </div>
</div>

<div id="desc" class="container">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <p style="text-align: center">
                <?php
                $sql_query = "SELECT bio FROM users WHERE userid='$userid'";
                $result = $connection->query($sql_query);
                while($row = $result->fetch_assoc()){
                    echo $row['bio'];
                }
                ?> </p>
        </div>
        <div class="col-md-2"></div>
    </div>
</div>

<?php
genDivs();
function genDivs()
{
    if($_GET['userid'] == null){
        $userid = $_SESSION['userid'];
    } else{
        $userid = $_GET['userid'];
    }
    $connection = new mysqli("eu-cdbr-azure-west-c.cloudapp.net", "b0b05a48637b3e", "2d0628d7", "wb1306507");

    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }else{
        $sql_query = "SELECT description FROM adventures WHERE userid='$userid'";
        $result = $connection->query($sql_query);
        while ($row = $result->fetch_assoc()) {
            echo '
            <div class="container">
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <img  src="http://placehold.it/150x50&text=Logo"  alt="Profile-Photo" >
                        <h6> ' . $row['description']. ' </h6>
                    </div>
                    <div class="col-md-2"></div>
                </div>
            </div>';
        }
    }
}
?>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="http://wb1306507.azurewebsites.net/bootstrap-3.3.6-dist/js/bootstrap.min.js"></script>
</body>
</html>