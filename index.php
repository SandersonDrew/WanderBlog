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
        <style>
            header {
                position: static;
                background-color:orange;
                border-bottom: 3px solid black;
                outline: 1.5px solid white;}

            ul {
                position: static;
                list-style-type: none;
                margin: 0;
                padding: 0;
                overflow: hidden;
                background-color: grey;
            }

            li {
                position: static;
                float: left;
            }


            li a {
                position: static;
                display: inline-block;
                color: white;
                text-align: center;
                padding: 14px 16px;
                text-decoration: none;
            }

            li a:hover {
                background-color: #111;
        </style>
    </head>
    <body>
    <header>
        <div align="right">
            <br action="login.php" method="post">
            <br>
            <label>UserName :</label>
            <input id="name" name="username" placeholder="username" type="text">
            <br>
            <label>Password :</label>
            <input id="password" name="password" placeholder="**********" type="password">
            <br>
            <input name="submit" type="submit" value=" Login ">
            <span><?php echo $error; ?></span>
            </form>
        </div>
        <div align="left">
            <img src="/Photos/logoback.png" width="210" height="110" alt=""/>
        </div>
    </header>
    <ul>
        <li><a href="phpmyadmin/index.php">Home</a></li>
        <li><a href="#news">News</a></li>
        <li><a href="#contact">Contact</a></li>
        <li><a href="#about">About</a></li>
    </ul>

    </body>
</html>
