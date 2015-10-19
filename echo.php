<?php
/**
 * Created by PhpStorm.
 * User: 1306507
 * Date: 19/10/2015
 * Time: 14:55
 */

$provisionedActivity = array("specs", "drugs", "rocknroll"); // declares the array

$provisionedActivity[1] =  "hugs";

unset($provisionedActivity[2]); // removes the array in position 2

foreach($provisionedActivity as $x) {
    print "<p>$x</p>";
}


?>