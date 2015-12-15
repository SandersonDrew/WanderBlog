<?php
//include('login.php'); // Includes Login Script

if(isset($_SESSION['login_user'])){
    header("location: profiletest.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>WanderBlog Login</title>
    <link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>
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
</div>
</body>
</html>