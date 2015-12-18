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
    echo "you didn't submit a keyword";
} else {
    if (strlen($search) <= 1) {
        echo "Search term too short";
    } else {

        $result = mysqli_query($conn, "SELECT * FROM users WHERE displayName LIKE'%$search%' ORDER BY username");

        if ($result->num_rows > 0) {
            echo '<table width="60%" border="1">';
            echo '<tr>';
            echo '<th>';
            echo "User Name: " ;
            echo '</th>';
            echo '<th>';
            echo "Display Name: " ;
            echo '</th>';
            echo '<th>';
            echo "User ID: " ;
            echo '</th>';
            echo '<th>';
            echo "Votes: " ;
            echo '</th>';
            echo '</tr>';
            while ($row = $result->fetch_assoc()) {
                echo '<tr>';
                echo '<td>';
                echo $row["username"];
                echo '</td>';
                echo '<td>';
                echo $row["displayName"];
                echo '</td>';
                echo '<td>';
                echo $row["userid"] ;
                echo '</td>';
                echo '<td>';
                echo "0 " ;
                echo '</td>';
                echo '</tr>';
            }
            echo '</table>';

        } else {
            echo "0 results";
        }
        $conn->close();
    }
}
?>