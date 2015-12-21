<?php
include('session.php');
if (isset($_POST['submit'])) {
        $userid = $_POST['userid'];
        $adventureid = $_POST['adventureid'];
        $connection = new mysqli("eu-cdbr-azure-west-c.cloudapp.net", "b0b05a48637b3e", "2d0628d7", "wb1306507");
        $swing = $_POST['swing'];
        mysqli_query($connection, "INSERT INTO votes(adventureid,userid,swing) VALUES($adventureid,$userid,$swing) ")
        echo $adventureid;
        $connection->close(); // Closing Connection
}