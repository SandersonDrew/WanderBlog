<?php
include('session.php');
if (isset($_GET['submit'])) {
    $adventureid = $_GET['adventureid'];
    $connection = new mysqli("eu-cdbr-azure-west-c.cloudapp.net", "b0b05a48637b3e", "2d0628d7", "wb1306507");
    $text = getval($connection,"SELECT description FROM adventures WHERE adventureid='$adventureid'");
    $authid = getval($connection,"SELECT userid FROM adventures WHERE adventureid='$adventureid'");
    $authname= getval($connection,"SELECT displayName FROM users WHERE userid='$authid'");
    $advname = getval($connection,"SELECT adventurename FROM adventures WHERE adventureid='$adventureid'");
    $advdate = getval($connection,"SELECT date FROM adventures WHERE adventureid='$adventureid'");
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
			height: 600px;
            border: 1px solid black;
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
            </div>
        </div>
        <div class="col-md-1"></div>
    </div>
    <div class="row">
        <div class = "adventure">
            <div class="col-md-1"></div>
            <div class="col-md-10">
                <p><?php echo $text?></p>
            </div>
            <div class="col-md-1"></div>
        </div>
    </div>
</div>
</body>
</html>
