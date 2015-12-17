<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/profile.css">
    <link rel="stylesheet" type="text/css" href="css/navbar.css">
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

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Welcome</title>

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
		.slider{
			width: 800px;
			height: 350px;
			overflow: hidden;
			margin: 30px auto;
            top: 10px;
            border: 1px solid black;
		}
		.slider img{
			width:800px;
			height:350px;
			display: none;
            border: 1px solid black;
		}
		</style>
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/jquery-ui.min.js"></script>
		<script type="text/javascript">
            $(document).ready(function() {
                // This will add a vote eventually.
                $(".adventure #up").click(function() {
                    alert("upvote");
                });
                // this will remove a vote.
                $(".adventure #down").click(function() {
                    alert("downvote");
                });
            });
			function Slider(){
				$(".slider #1").show("fade", 500);
				$(".slider #1").delay(5500).hide("slide", {direction: 'left'},500);
				var sc = $(".slider img").size();
				var count = 2;
				setInterval(function(){
					$(".slider #"+count).show("slide",{direction: 'right'},500);
					$(".slider #"+count).delay(5500).hide("slide",{direction: 'left'},500);
					if(count == sc){
						count = 1;
					}
					else{
						count = count + 1;
					}
				}, 6500);
			}
		</script>
</head>
<body onload="Slider();">

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
                <ul class="nav navbar-nav navbar-right">

                    <li id="logged-in">
                        <?php if($_SESSION['login_user']!= null){
                            echo $name;
                        }else{
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
        <div class="span4"></div>
        <div class="span4"><img class="center-block img-circle" src="/Photos/Profile_Photos/122.jpg"  alt="Profile-Photo" ></div>
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
    if($_GET['username'] == null){
        $userid = $_SESSION['userid'];
        $connection = new mysqli("eu-cdbr-azure-west-c.cloudapp.net", "b0b05a48637b3e", "2d0628d7", "wb1306507");
    } else{
        $connection = new mysqli("eu-cdbr-azure-west-c.cloudapp.net", "b0b05a48637b3e", "2d0628d7", "wb1306507");
        $temp = $_GET['username'];
        $userid = getval($connection,"SELECT userid FROM users WHERE username = '$temp'");
    }

    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }else{
        $sql_query = "SELECT description,adventureid FROM adventures WHERE userid='$userid'";
        $result = $connection->query($sql_query);
        while ($row = $result->fetch_assoc()) {
            echo '
            <div class="container">
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <img  src="http://placehold.it/150x50&text=Logo"  alt="Profile-Photo" >
                        <h6> ' . $row['description']. ' </h6>
                        <form action="adventure.php" method="get">
                            <input type="hidden" name="adventureid" value="'.$row['adventureid'].'"/>
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
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="http://wb1306507.azurewebsites.net/bootstrap-3.3.6-dist/js/bootstrap.min.js"></script>
<div class="container">

<!--<php?
    $sql_query = "SELECT TOP 5 * FROM votes WHERE' ORDER BY swing DESC";
    $result = $connection->query($sql_query);
    while ($row = $result->fetch_assoc()) {
    echo '<h6> ' . $row['adventureid']. ' </h6>
    ?>-->
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <div class = "adventure">
                <h1><?php echo $advname?></h1>
                <div class = "slider">
                    <img id="1" src ="http://www.cats.org.uk/uploads/branches/211/5507692-cat-m.jpg" border="0" alt = "test">
                    <img id="2" src ="http://www.cats.org.uk/uploads/images/cats/110585_0.png" border="0" alt = "test">
                    <img id="3" src ="http://www.cats.org.uk/uploads/branches/211/adoption%20fee.png" border="0" alt = "test">
                    <img id="4" src ="http://www.aaj.tv/wp-content/uploads/2015/08/bullet_cat1.jpg" border="0" alt = "test">
                </div>
                <div class="info">
                    <p><?php echo $authname?></p>
                    <p><?php echo $advdate?></p>
                    <p>Upvotes: </p>
                    <img id="up" src = "http://i68.tinypic.com/dh7giv.jpg">
                    <p>Downvotes: </p>
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
        <div class="col-md-1"></div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <div class = "adventure">
                <h1><?php echo $advname?></h1>
                <div class = "slider">
                    <img id="1" src ="http://www.cats.org.uk/uploads/branches/211/5507692-cat-m.jpg" border="0" alt = "test">
                    <img id="2" src ="http://www.cats.org.uk/uploads/images/cats/110585_0.png" border="0" alt = "test">
                    <img id="3" src ="http://www.cats.org.uk/uploads/branches/211/adoption%20fee.png" border="0" alt = "test">
                    <img id="4" src ="http://www.aaj.tv/wp-content/uploads/2015/08/bullet_cat1.jpg" border="0" alt = "test">
                </div>
                <div class="info">
                    <p><?php echo $authname?></p>
                    <p><?php echo $advdate?></p>
                    <p>Upvotes: </p>
                    <img id="up" src = "http://i68.tinypic.com/dh7giv.jpg">
                    <p>Downvotes: </p>
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
        <div class="col-md-1"></div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <div class = "adventure">
                <h1><?php echo $advname?></h1>
                <div class = "slider">
                    <img id="1" src ="http://www.cats.org.uk/uploads/branches/211/5507692-cat-m.jpg" border="0" alt = "test">
                    <img id="2" src ="http://www.cats.org.uk/uploads/images/cats/110585_0.png" border="0" alt = "test">
                    <img id="3" src ="http://www.cats.org.uk/uploads/branches/211/adoption%20fee.png" border="0" alt = "test">
                    <img id="4" src ="http://www.aaj.tv/wp-content/uploads/2015/08/bullet_cat1.jpg" border="0" alt = "test">
                </div>
                <div class="info">
                    <p><?php echo $authname?></p>
                    <p><?php echo $advdate?></p>
                    <p>Upvotes: </p>
                    <img id="up" src = "http://i68.tinypic.com/dh7giv.jpg">
                    <p>Downvotes: </p>
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
        <div class="col-md-1"></div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <div class = "adventure">
                <h1><?php echo $advname?></h1>
                <div class = "slider">
                    <img id="1" src ="http://www.cats.org.uk/uploads/branches/211/5507692-cat-m.jpg" border="0" alt = "test">
                    <img id="2" src ="http://www.cats.org.uk/uploads/images/cats/110585_0.png" border="0" alt = "test">
                    <img id="3" src ="http://www.cats.org.uk/uploads/branches/211/adoption%20fee.png" border="0" alt = "test">
                    <img id="4" src ="http://www.aaj.tv/wp-content/uploads/2015/08/bullet_cat1.jpg" border="0" alt = "test">
                </div>
                <div class="info">
                    <p><?php echo $authname?></p>
                    <p><?php echo $advdate?></p>
                    <p>Upvotes: </p>
                    <img id="up" src = "http://i68.tinypic.com/dh7giv.jpg">
                    <p>Downvotes: </p>
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
        <div class="col-md-1"></div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <div class = "adventure">
                <h1><?php echo $advname?></h1>
                <div class = "slider">
                    <img id="1" src ="http://www.cats.org.uk/uploads/branches/211/5507692-cat-m.jpg" border="0" alt = "test">
                    <img id="2" src ="http://www.cats.org.uk/uploads/images/cats/110585_0.png" border="0" alt = "test">
                    <img id="3" src ="http://www.cats.org.uk/uploads/branches/211/adoption%20fee.png" border="0" alt = "test">
                    <img id="4" src ="http://www.aaj.tv/wp-content/uploads/2015/08/bullet_cat1.jpg" border="0" alt = "test">
                </div>
                <div class="info">
                    <p><?php echo $authname?></p>
                    <p><?php echo $advdate?></p>
                    <p>Upvotes: </p>
                    <img id="up" src = "http://i68.tinypic.com/dh7giv.jpg">
                    <p>Downvotes: </p>
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
        <div class="col-md-1"></div>
    </div>
</div>
</body>
</html>
