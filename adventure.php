<?php
include('session.php');
if (isset($_GET['submit'])) {
    $adventureid = $_GET['adventureid'];
    $userid = $_SESSION['userid'];
    $connection = new mysqli("eu-cdbr-azure-west-c.cloudapp.net", "b0b05a48637b3e", "2d0628d7", "wb1306507");
    $text = getval($connection,"SELECT description FROM adventures WHERE adventureid='$adventureid'");
    $authid = getval($connection,"SELECT userid FROM adventures WHERE adventureid='$adventureid'");
    $authname= getval($connection,"SELECT displayName FROM users WHERE userid='$authid'");
    $advname = getval($connection,"SELECT adventurename FROM adventures WHERE adventureid='$adventureid'");
    $advdate = getval($connection,"SELECT date FROM adventures WHERE adventureid='$adventureid'");
    $numVotes = getval($connection, "SUM(swing) FROM votes WHERE adventureid = '$adventureid'");
}
function getval($mysqli, $sql) {
    $result = $mysqli->query($sql);
    $value = $result->fetch_array(MYSQLI_NUM);
    return is_array($value) ? $value[0] : "";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Welcome</title>

    <!-- Bootstrap -->
    <link href="http://wb1306507.azurewebsites.net/bootstrap-3.3.6-dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="http://wb1306507.azurewebsites.net/bootstrap-3.3.6-dist/css/extra.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->



    <title>Welcome to WanderBlog</title>

    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/jquery-ui.min.js"></script>
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

<div class="container">
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <h1><?php echo $advname?></h1>
            <h2><p><?php echo $authname?></p></h2>
            <h2><p><?php echo $advdate?></p></h2>
            <h2><p>Votes: <?php echo $numVotes ?></p></h2>
            <form action = 'createVote.php' method = "POST" >
                <input type = "hidden" name = "userid" value = "<?php echo $userid ?>" >
                <input type = "hidden" name = "advid" value = "<?php echo $adventureid ?>" >
                <input type = "hidden" name = "swing" value = "1" >
                <input type = "image" src="http://i68.tinypic.com/dh7giv.jpg" name="submit" value="submit">
            </form>
            <form action = 'createVote.php' method = "POST" >
                <p>Downvotes: </p>
                <input type = "hidden" name = "userid" value = "<?php echo $userid ?>" >
                <input type = "hidden" name = "advid" value = "<?php echo $adventureid ?>" >
                <input type = "hidden" name = "swing" value = "-1" >
                <input type = "image" src="http://i68.tinypic.com/2r6pq1g.jpg" name="submit" value="submit">
            </form>
            <div class="col-md-1"></div>
            <div class="col-md-10">
                <p><?php echo $text?></p>
            </div>
            <div class="col-md-1"></div>
        </div>
        <div class="col-md-1"></div>
    </div>
</div>

<?php
genDivs();
function genDivs()
{
    $adventureid = $_GET['adventureid'];
    if($_SESSION['userid'] != null){
        $userid = $_SESSION['userid'];
        echo '
            <div class="container">
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <form action="postComment.php" method="post">
                        <input type="hidden" name="userid" value="'.$userid.'"/>
                        <input type="hidden" name="adventureid" value="'.$adventureid.'"/>
                        <input type="text" name="comment" placeholder="Please type a comment"/>
                        <input type="submit" name="submit" value="Post Comment"/>
                    </div>
                    <div class="col-md-2"></div>
                </div>
            </div>';
        $connection = new mysqli("eu-cdbr-azure-west-c.cloudapp.net", "b0b05a48637b3e", "2d0628d7", "wb1306507");
    } else{
        $connection = new mysqli("eu-cdbr-azure-west-c.cloudapp.net", "b0b05a48637b3e", "2d0628d7", "wb1306507");
    }

    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }else{
        $sql_query = "SELECT text FROM comments WHERE adventureid='$adventureid'";
        $result = $connection->query($sql_query);
        while ($row = $result->fetch_assoc()) {
            echo '
            <div class="container">
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <h6> ' . $row['text']. ' </h6>
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
