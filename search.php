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

        $result = mysqli_query($conn, "SELECT * FROM users WHERE username='$search'");

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "username: " . $row["username"];
            }
        } else {
            echo "0 results";
        }
        $conn->close();
    }
}
?>