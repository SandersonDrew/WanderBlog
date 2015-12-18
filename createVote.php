<?php
if(isset($_POST['submit'])){
    $connection = new mysqli("eu-cdbr-azure-west-c.cloudapp.net", "b0b05a48637b3e", "2d0628d7", "wb1306507");

    $userID = $_POST['userid'];
    $adventureID = $_POST['advid'];
    if($_POST['submit'] == "Upvote"){
        $swing = 1;
    }
    else{
        $swing = 0;
    }


    if ($connection->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    echo $userID;
    echo $adventureID;
    echo $swing;


    mysqli_query($connection, "INSERT INTO votes(userID, adventureID, swing) VALUES($userID, $adventureID, $swing)");

    header('location: adventure.php/?adventureid='.$adventureID.'&submit=submit');
}
