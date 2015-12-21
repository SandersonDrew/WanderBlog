<?php

// Gets the relevant information about adventures from the adventures database. 
include('session.php');
if (isset($_GET['submit'])) {
    $adventureid = $_GET['adventureid'];
    $userid = $_SESSION['userid'];
    $connection = new mysqli("eu-cdbr-azure-west-c.cloudapp.net", "b0b05a48637b3e", "2d0628d7", "wb1306507");
    $text = getval($connection,"SELECT description FROM adventures WHERE adventureid=".$adventureid);
    $authid = getval($connection,"SELECT userid FROM adventures WHERE adventureid=".$adventureid);
    $authname= getval($connection,"SELECT displayName FROM users WHERE userid=".$authid);
    $advname = getval($connection,"SELECT adventurename FROM adventures WHERE adventureid=".$adventureid);
    $advdate = getval($connection,"SELECT advdate FROM adventures WHERE adventureid=".$adventureid);
    $numVotes = getval($connection, "SELECT SUM(swing) FROM votes WHERE adventureid = $adventureid");
}
else{
    header("location: profile.php");
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
    <title><?php echo $advname ?></title>

    <!-- Bootstrap -->
    <link href="http://wbgroupc.azurewebsites.net/bootstrap-3.3.6-dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="http://wbgroupc.azurewebsites.net/bootstrap-3.3.6-dist/css/extra.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/navbar.css">

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
                    <li><a href="searchIndex.php">Search</a></li>
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

<div class="container">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <!-- place the relevant data from the database in the html, title, author, date, etc...-->
            <h1><p><?php echo $advname?></p></h1>
            <h2><p><?php echo $authname?></p></h2>
            <h2><p><?php echo $advdate?></p></h2>
            <h2><p><?php echo $location?></p></h2>
            <h2><p>Votes: <?php echo $numVotes ?></p></h2>
            <form action = 'upvote.php' method = "POST" >
                <input type = "hidden" name = "userid" value = "<?php echo $userid ?>" >
                <input type = "hidden" name = "advid" value = "<?php echo $adventureid ?>" >
                <input type = "hidden" name = "swing" value = "1" >
                <input type = "submit" name="submit" value="Upvote">
            </form>
            <form action = 'upvote.php' method = "POST" >
                <p>Downvotes: </p>
                <input type = "hidden" name = "userid" value = "<?php echo $userid ?>" >
                <input type = "hidden" name = "advid" value = "<?php echo $adventureid ?>" >
                <input type = "hidden" name = "swing" value = "-1" >
                <input type = "submit" name="submit" value="Downvote">
            </form>
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <!-- The main text for the adventure-->
                <p><?php echo $text?></p>
            </div>
            <div class="col-md-2"></div>
        </div>
        <div class="col-md-2"></div>
    </div>
</div>

<?php

// If the user logged on is also the author of the adventures, they can edit or delete it.
if($userid == $authid){
    echo '
    <form action = "editAdventure.php" method = "POST" >
        <input type = "hidden" name = "userid" value = "'.$userid.'" >
        <input type = "hidden" name = "advid" value = "'.$adventureid.'" >
        <input type = "submit" name="submit" value="Edit Adventure">
    </form>
    ';
    echo '
    <form action = "deleteAdventure.php" method = "POST" >
        <input type = "hidden" name = "userid" value = "'.$userid.'" >
        <input type = "hidden" name = "advid" value = "'.$adventureid.'" >
        <input type = "submit" name="submit" value="Delete Adventure">
    </form>
    ';
}
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
                        </form>
                    </div>
                    <div class="col-md-2"></div>
                </div>
            </div>';
        $connection = new mysqli("eu-cdbr-azure-west-c.cloudapp.net", "b0b05a48637b3e", "2d0628d7", "wb1306507");
    } else{
        $connection = new mysqli("eu-cdbr-azure-west-c.cloudapp.net", "b0b05a48637b3e", "2d0628d7", "wb1306507");
    }
echo '
    <form action="upvote.php" method="POST">
     <input type="hidden" name="adventureid" value="\'.$adventureid.\'"/>
   <input type="image" name="upvote" src="http://i68.tinypic.com/dh7giv.jpg width=75 height=75" value="Submit" />
</form>';

    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }else{
        
        // Display the comments on the adventure.
        $sql_query = "SELECT text FROM comments WHERE adventureid='$adventureid'";
        $result = $connection->query($sql_query);
        while ($row = $result->fetch_assoc()) {
            echo '
            <div class="container">
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-6">
                        <h6> ' . $row['text']. ' </h6>
                    </div>
                    <div class="col-md-1">
                        <form action="editComment.php" method="post">
                        <input type="hidden" name="userid" value="'.$userid.'"/>
                        <input type="hidden" name="adventureid" value="'.$adventureid.'"/>
                        <input type="submit" name="submit" value="Edit Comment"/>
                        </form>
                    </div>
                    <div class="col-md-1">
                        <form action="deleteComment.php" method="post">
                        <input type="hidden" name="userid" value="'.$userid.'"/>
                        <input type="hidden" name="adventureid" value="'.$adventureid.'"/>
                        <input type="submit" name="submit" value="Delete Comment"/>
                        </form>
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
<script src="http://wbgroupc.azurewebsites.net/bootstrap-3.3.6-dist/js/bootstrap.min.js"></script>
</body>
</html>
