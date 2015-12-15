<?php
$localhost = "eu-cdbr-azure-west-c.cloudapp.net";
$username = "b0b05a48637b3e";
$password = "2d0628d7";
$database = "wb1306507";
$table = "users";
$conn = new mysqli($localhost, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$button = $_GET [ 'submit' ];
$search = $_GET [ 'search' ];

if( !$button ){
    echo "you disdn't submit a keyword";
} else {
    if (strlen($search) <= 1) {
        echo "Search term too short";
    } else {

        $sql = "SELECT * FROM users WHERE username='$search''";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                echo "id: " . $row["id"] . " - Name: " . $row["firstname"] . " " . $row["lastname"] . "<br>";
            }
        } else {
            echo "0 results";
        }
        $conn->close();
    }
}
?>