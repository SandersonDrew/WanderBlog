<?php
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "myDB";

$userid = $_POST['userid'];
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection

mysqli_query($connection, "INSERT INTO votes()