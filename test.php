<?php
$connection = new mysqli("eu-cdbr-azure-west-c.cloudapp.net", "b0b05a48637b3e", "2d0628d7", "wb1306507");
echo "starting";
$sql = "SELECT * FROM adventures";
$result = $mysqli->query($sql);
$value = $result->fetch_array(MYSQLI_NUM);
echo is_array($value) ? $value[0] : "";
?>