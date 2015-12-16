<?php
if(isset($_SESSION['login_user'])){
    header("location: profiletest.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>WanderBlog Login</title>
    <link href="style.css" rel="stylesheet" type="text/css">
    <style type="text/css">
		.adventure{
			width: 900px;
			height: 500px;
			border: 1px black;
		}
        .adventure img{
            width: 60px;
            height: 60px;
            position: absolute;
            bottom: 0;
        }

		.slider{
			width: 800px;
			height: 350px;
			overflow: hidden;
			margin: 30px auto;
		}

		.slider img{
			width:800px;
			height:350px;
			display: none;
		}

		</style>
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/jquery-ui.min.js"></script>
		<script type="text/javascript">

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
    <h1>WanderBlog Login</h1>
    <div id="login">
        <h2>Login </h2>
        <form action="login.php" method="post">
            <label>UserName :</label>
            <input id="name" name="username" placeholder="username" type="text">
            <label>Password :</label>
            <input id="password" name="password" placeholder="**********" type="password">
            <input name="submit" type="submit" value=" Login ">
            <span><?php echo $error; ?></span>
        </form>
    </div>
</div>
<div id="main2">
    <div id="NewUser">
        <h2>New User</h2>
        <form action="createNewUser.php" method="post">
            <label>UserName :</label>
            <input id="name" name="username" placeholder="username" type="text">
            <label>Email :</label>
            <input id="email" name="email" placeholder="email" type="text">
            <label>Password :</label>
            <input id="password" name="password" placeholder="**********" type="password">
            <input name="submit" type="submit" value=" Login ">
            <span><?php echo $error; ?></span>
        </form>
    </div>
    <div class = "adventure">
		    <img src = "http://i68.tinypic.com/dh7giv.jpg">
			<img src = "http://i68.tinypic.com/dh7giv.jpg">

    	<div class = "slider">
			<img id="1" src ="http://www.cats.org.uk/uploads/branches/211/5507692-cat-m.jpg" border="0" alt = "test">
			<img id="2" src ="http://www.cats.org.uk/uploads/images/cats/110585_0.png" border="0" alt = "test">
			<img id="3" src ="http://www.cats.org.uk/uploads/branches/211/adoption%20fee.png" border="0" alt = "test">
			<img id="4" src ="http://www.aaj.tv/wp-content/uploads/2015/08/bullet_cat1.jpg" border="0" alt = "test">
		</div>
	</div>
</div>
</body>
</html>
