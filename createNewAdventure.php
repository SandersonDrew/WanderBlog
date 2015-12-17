<?php
include('session.php');
if (isset($_POST['submit'])) {
    if (empty($_POST['Text']) || empty($_POST['Location'])) {
        $error = "Text or Location is empty";
        echo $error;
    } else {
        // Define values
        $name = $_POST['advname'];
        $text = $_POST['Text'];
        $location = $_POST['Location'];
        $date = $_POST['date'];
        $userid = $_SESSION['userid'];
        // Establishing Connection with Server
        $connection = new mysqli("eu-cdbr-azure-west-c.cloudapp.net", "b0b05a48637b3e", "        2d0628d7", "wb1306507");
        echo "Test";
        // To protect MySQL injection for Security purpose
        $text = stripslashes($text);
        $location = stripslashes($location);
        // SQL query to insert new user details into database and log them in
        mysqli_query($connection, "INSERT INTO adventures(userid,description,location,adventurename,advdate) VALUES($userid,'$text','$location','$advname','$date') ");
        $connection->close(); // Closing Connection
        header("location: profile.php");
    }
}