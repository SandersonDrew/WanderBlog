<?php
include('session.php');
if (isset($_POST['submit'])) {
    if (empty($_POST['Text']) || empty($_POST['Location'])) {
        $error = "Text or Location is empty";
        echo $error;
    } else {
        // Define values
        $advid = $_POST['advid'];
        $name = $_POST['advname'];
        $text = $_POST['Text'];
        $location = $_POST['Location'];
        $date = $_POST['date'];
        $userid = $_SESSION['userid'];
        // Establishing Connection with Server
        $connection = new mysqli("eu-cdbr-azure-west-c.cloudapp.net", "b0b05a48637b3e", "2d0628d7", "wb1306507");
        mysqli_query($connection,"UPDATE adventures SET  adventurename=".$name." description=".$text." advdate=".$date."WHERE adventureid=".$advid);
        header("location: profile.php");
    }
}