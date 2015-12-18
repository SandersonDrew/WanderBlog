<?php
include('session.php');
if (isset($_POST['submit'])) {
    if (!empty($_POST['Text'])) {
        // Define values
        $text = $_POST['Text'];
        $cid = $_POST['cid'];
        $advid = $_POST['advid'];
        // Establishing Connection with Server
        $connection = new mysqli("eu-cdbr-azure-west-c.cloudapp.net", "b0b05a48637b3e", "2d0628d7", "wb1306507");
        mysqli_query($connection, "UPDATE comments SET text='$text'WHERE commentid = $cid");
        header("location: adventure.php?adventureid=".$advid."&submit=Go+To+Adventure+Page");
    }
}