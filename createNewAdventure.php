<?php
include('session.php');
echo "Hello World";
if (isset($_POST['submit'])) {
    if (empty($_POST['Text']) || empty($_POST['Location'])) {
        $error = "Text or Location is empty";
        echo $error;
    } else {

        // Define $text
        $text = $_POST['Text'];
        $location = $_POST['Location'];
        $userid = $_SESSION['userid'];
        // Establishing Connection with Server
        $connection = new mysqli("eu-cdbr-azure-west-c.cloudapp.net", "b0b05a48637b3e", "2d0628d7", "wb1306507");
        // To protect MySQL injection for Security purpose
        $text = stripslashes($text);
        $location = stripslashes($location);
        // SQL query to insert new user details into database and log them in
        mysqli_query($connection, "INSERT INTO adventures(userid,text,Location) VALUES('$userid','$text','$location') ");
        $connection->close(); // Closing Connection
        header("location: profiletest.php");
    }
}