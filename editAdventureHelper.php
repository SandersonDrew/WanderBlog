<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include('session.php');
if (isset($_POST['submit'])) {
    if (!empty($_POST['Text']) && !empty($_POST['Location']) && !empty($_POST['advname']) && !empty($_POST['date'])) {
        // Define values
        $advid = $_POST['advid'];
        $name = $_POST['advname'];
        $text = $_POST['Text'];
        $location = $_POST['Location'];
        $date = $_POST['date'];
        $userid = $_SESSION['userid'];
        // Establishing Connection with Server
        $connection = new mysqli("eu-cdbr-azure-west-c.cloudapp.net", "b0b05a48637b3e", "2d0628d7", "wb1306507");
        mysqli_query($connection, "UPDATE adventures SET adventurename=" . $name . " ,description=" . $text . " ,advdate=" . $date . " ,location=" . $location . "WHERE adventureid=" . $advid);
        header("location: adventure.php?adventureid=".$advid."&submit=Go+To+Adventure+Page");
    }
}