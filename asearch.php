<?php
$localhost = "eu-cdbr-azure-west-c.cloudapp.net";
$username = "b0b05a48637b3e";
$password = "2d0628d7";
$database = "wb1306507";
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

        $result = mysqli_query($conn, "SELECT * FROM adventures WHERE adventurename LIKE'%$search%' ORDER BY adventurename");

        if ($result->num_rows > 0) {
            echo '<table width="60%" border="1">';
            echo '<tr>';
            echo '<th>';
            echo "Aventure Name: " ;
            echo '</th>';
            echo '<th>';
            echo "Description: " ;
            echo '</th>';
            echo '<th>';
            echo "Location: " ;
            echo '</th>';
            echo '</tr>';
            while ($row = $result->fetch_assoc()) {
                echo '<tr>';
                echo '<td>';
                echo $row["adventurename"];
                echo '</td>';
                echo '<td>';
                echo $row["description"];
                echo '</td>';
                echo '<td>';
                echo $row["userid"] ;
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