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
    <link href="http://wbgroupc.azurewebsites.net/bootstrap-3.3.6-dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/navbar.css">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

    <![endif]-->
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

                    <li>
                        <?php
                        if($_SESSION['login_user']!= null){
                            echo "<p id=logged-in>$name</p>";
                            ?>
                            <button type="button" class="btn btn-info"><a href="logout.php">Log Out</a></button>
                            <?php
                        }
                        else{

                            require_once("loginpopup.php");

                        }
                        ?>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
</nav>
<?php
// Establishing Connection with Server
$connection = new mysqli("eu-cdbr-azure-west-c.cloudapp.net", "b0b05a48637b3e", "2d0628d7", "wb1306507");
$advid = $_POST['advid'];
$userid = $_SESSION['userid'];
$cid = getval($connection,"SELECT commentid FROM comments WHERE adventureid = '$advid' AND userid='$userid'");
$text = getval($connection,"SELECT text FROM comments WHERE commentid = '$cid'");
$connection->close(); // Closing Connection

function getval($mysqli, $sql) {
    $result = $mysqli->query($sql);
    $value = $result->fetch_array(MYSQLI_NUM);
    return is_array($value) ? $value[0] : "";
}
?>

<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8" style="border:1px solid #000;">
        <p><h4>Edit Your Comment</h4>
        <form action="editCommentHelper.php" method="post">
            <input type="hidden" name="cid" value="<?php echo $cid ?>">
            <input type="hidden" name="advid" value="<?php echo $advid ?>">
            <h6>Describe Your Adventure: </h6> <input type="text" name="Text" value="<?php echo $text ?>">
            <input type="submit" name="submit" value="submit">
        </form>
        <br>
    </div>
    <div class="col-md-2"></div>
</div>
</body>
</html>