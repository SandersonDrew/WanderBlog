<?php
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $connection = new mysqli("eu-cdbr-azure-west-c.cloudapp.net", "b0b05a48637b3e", "2d0628d7", "wb1306507");
    mysqli_query($connection, "UPDATE users SET verified=1 WHERE username = '$username'");
    header("location: admin.php ");
}