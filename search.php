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

        while($tableName = mysql_fetch_row($result)) {

            $table = $tableName[0];

            echo '<h3>',$table,'</h3>';
            $result2 = mysql_query('SHOW COLUMNS FROM '.$table) or die('cannot show columns from '.$table);
            if(mysql_num_rows($result2)) {
                echo '<table cellpadding="0" cellspacing="0" class="db-table">';
                echo '<tr><th>Field</th><th>Type</th><th>Null</th><th>Key</th><th>Default<th>Extra</th></tr>';
                while($row2 = mysql_fetch_row($result2)) {
                    echo '<tr>';
                    foreach($row2 as $key=>$value) {
                        echo '<td>',$value,'</td>';
                    }
                    echo '</tr>';
                }
                echo '</table><br />';
            }
        }

        $conn->close();
    }
}
?>