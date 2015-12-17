<?php
$connection = new mysqli("eu-cdbr-azure-west-c.cloudapp.net", "b0b05a48637b3e", "2d0628d7", "wb1306507");
$result = mysqli_query($connection, "SELECT * FROM adventures ");
    ?>