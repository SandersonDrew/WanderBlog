<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$connection = new mysqli("eu-cdbr-azure-west-c.cloudapp.net", "b0b05a48637b3e", "2d0628d7", "wb1306507");
echo "starting";
$sql = "SELECT * FROM adventures";
$result = $connection->query($sql);
$value = $result->fetch_array(MYSQLI_NUM);
echo is_array($value) ? $value[0] : "";
?>