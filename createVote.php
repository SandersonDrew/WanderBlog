<?php
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


$sql = mysqli_query($connection, "INSERT INTO votes(userID, adventureID, swing) VALUES('1242', '22', '$swing')");

if ($connection->query($sql) === TRUE) {
    echo "New records created successfully";
} else {
    echo "Errosr: " . $sql . "<br>" . $conn->error .mysql_error();
}
?>