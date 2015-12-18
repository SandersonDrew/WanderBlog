<?php
include('session.php');
$userid = $_SESSION['userid'];
$advid = $_POST['advid'];
$connection = new mysqli("eu-cdbr-azure-west-c.cloudapp.net", "b0b05a48637b3e", "2d0628d7", "wb1306507");
mysqli_query($connection,"DELETE FROM adventures WHERE adventureid='$advid'");
$connection->close();
header('location: profile.php');