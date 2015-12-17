<?php
include('session.php');
if (isset($_POST['submit'])) {
    if (!empty($_POST['comment'])){
        $comment = $_POST['comment'];
        $userid = $_POST['userid'];
        $adventureid = $_POST['adventureid'];
        $connection = new mysqli("eu-cdbr-azure-west-c.cloudapp.net", "b0b05a48637b3e", "2d0628d7", "wb1306507");
        $comment = stripslashes($comment);
        mysqli_query($connection, "INSERT INTO comments(userid,adventureid,text) VALUES($userid,'$adventureid','$comment') ");
        $connection->close(); // Closing Connection
        header('location: adventure.php?adventureid='.$adventureid.'&submit=Post+Comment');
    }
}