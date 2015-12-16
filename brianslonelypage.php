<?php
if(isset($_SESSION['login_user'])){
    header("location: profiletest.php");
}
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



    <title>Welcome to WanderBlog</title>
    <style type="text/css">
		.adventure{
			width: 900px;
			height: 500px;
            margin: 40px;
            border: 1px solid black;
		}

        .adventure img{
            width: 60px;
            height: 60px;
            bottom: 10px;
            align-content: center;
            horiz-align: center;
            border: 1px solid black;
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
<div id="main">
    <div class = "adventure">
    	<div class = "slider">
			<img id="1" src ="http://www.cats.org.uk/uploads/branches/211/5507692-cat-m.jpg" border="0" alt = "test">
			<img id="2" src ="http://www.cats.org.uk/uploads/images/cats/110585_0.png" border="0" alt = "test">
			<img id="3" src ="http://www.cats.org.uk/uploads/branches/211/adoption%20fee.png" border="0" alt = "test">
			<img id="4" src ="http://www.aaj.tv/wp-content/uploads/2015/08/bullet_cat1.jpg" border="0" alt = "test">
        </div>
            <img id="up" src = "http://i68.tinypic.com/dh7giv.jpg">
            <img id="down" src = "http://i68.tinypic.com/2r6pq1g.jpg">
	</div>
</div>
</div>
</body>
</html>
