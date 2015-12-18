<?php
if(isset($_POST['submit'])){
    $connection = new mysqli("eu-cdbr-azure-west-c.cloudapp.net", "b0b05a48637b3e", "2d0628d7", "wb1306507");

    $userID = $_POST['userid'];
    $adventureID = $_POST['advid'];
    $swing = $_POST['swing'];

    if ($connection->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    echo $userID;
    echo $adventureID;
    echo $swing;

    $query = mysqli_query($connection, "SELECT * FROM votes WHERE userid =".$userID."AND adventureid =".$adventureID);
    $result = mysqli_num_rows($query);
    if($result !=0){
        mysqli_query($connection, "UPDATE votes SET swing=".$swing."WHERE userid=".$userID."AND adventureid=".$adventureID);
    }else{
        mysqli_query($connection, "INSERT INTO votes(userID, adventureid, swing) VALUES($userID, $adventureID, $swing)");
    }

    header('location: adventure.php?adventureid='.$adventureID.'&submit=submit');
}
