<?php
$servername = "eu-cdbr-azure-west-c.cloudapp.net";
$username = "b0b05a48637b3e";
$password = "2d0628d7";
$database = "wb1306507";
$table = "users";

$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully<br>";


$result = $conn->query($sql);


$search_exploded = explode ( " ", $search );
$x = 0;
foreach( $search_exploded as $search_each ) {
    $x++;
    $construct = " ";
    if( $x == 1 )
        $construct .= "keywords LIKE '%$search_each%' ";
    else
        $construct .= "AND keywords LIKE '%$search_each%' ";
}
$construct = " SELECT * FROM users WHERE $construct ";
$result = $conn->query($construct);



$conn->close();
?>


