<?php
include('session.php');

function getval($mysqli, $sql) {
    $result = $mysqli->query($sql);
    $value = $result->fetch_array(MYSQLI_NUM);
    return is_array($value) ? $value[0] : "";
}
if($_GET['username'] == null){
    $userid = $_SESSION['userid'];
} else{
    $connection = new mysqli("eu-cdbr-azure-west-c.cloudapp.net", "b0b05a48637b3e", "2d0628d7", "wb1306507");//connecting to the database
    $temp = $_GET['username'];
    $userid = getval($connection,"SELECT userid FROM users WHERE username = '$temp'");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/profile.css">
    <link rel="stylesheet" type="text/css" href="css/navbar.css">
    <link rel="stylesheet" type="text/css" href="css/loginpopup.css">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Profile</title>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="http://wb1306507.azurewebsites.net/bootstrap-3.3.6-dist/js/bootstrap.min.js"></script>
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
                    $name = "Logged in as " . $_SESSION['displayName'] . "Log out?";
                }
                ?>
                <ul class="nav navbar-nav navbar-right">

                    <li id="logged-in">
                        <?php
                        if($_SESSION['login_user']!= null){//if user is logged in then echo their name
                            echo $name;
                        }
                        else{

                            require("loginpopup.php");//else have login button

                        }
                         ?></li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
</nav>

<?php
    if($_SESSION['login_user']!= null) { #if logged in
        $photopath = "/Photos/Profile_Photos" . $userid . ".jpg"; #path = /photos/profile_photos/userid.jpeg
    }
    else{
            $photopath = "http://placehold.it/150x50&text=Logo";
    }
?>

<div class="container">
    <div class="row">
        <div class="span4"></div>
        <div class="span4"><img class="center-block img-circle" src="<?php $photopath?>"  alt="Profile-Photo" ></div>
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
    if ($_GET['username'] == null) {
        $userid = $_SESSION['userid'];
        $connection = new mysqli("eu-cdbr-azure-west-c.cloudapp.net", "b0b05a48637b3e", "2d0628d7", "wb1306507");
    } else {
        $connection = new mysqli("eu-cdbr-azure-west-c.cloudapp.net", "b0b05a48637b3e", "2d0628d7", "wb1306507");
        $temp = $_GET['username'];
        $userid = getval($connection, "SELECT userid FROM users WHERE username = '$temp'");
    }

    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    } else {
        $sql_query = "SELECT description,adventureid FROM adventures WHERE userid='$userid'";
        $result = $connection->query($sql_query);
        while ($row = $result->fetch_assoc()) {
            echo '
            <div class="container">
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <img  src="http://placehold.it/150x50&text=Logo"  alt="Profile-Photo" >
                        <h6> ' . $row['description'] . ' </h6>
                        <form action="adventure.php" method="get">
                            <input type="hidden" name="adventureid" value="' . $row['adventureid'] . '"/>
                            <input type="submit" name="submit" value="Go To Adventure Page"/>
                        </form>
                    </div>
                    <div class="col-md-2"></div>
                </div>
            </div>';
        }
    }
}
?>


</body>
</html>