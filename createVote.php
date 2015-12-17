<?php
$connection = new mysqli("eu-cdbr-azure-west-c.cloudapp.net", "b0b05a48637b3e", "2d0628d7", "wb1306507");

$userID = $_POST['userid'];
$adventureID = $_POST['advid'];
$swing = $_POST['swing'];

mysqli_query($connection, "INSERT INTO users(userID, adventureID, swing) VALUES('$userID', '$adventureID', '$swing')");