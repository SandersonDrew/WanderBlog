<?php
/**
 * Created by PhpStorm.
 * User: 1306507
 * Date: 19/10/2015
 * Time: 14:55
 */

switch(date("d")){
    case 1:
    case 5:
    case 9:
    case 13:
    case 17:
    case 21:
    case 25:
    case 29:
        echo "No products are avaliable";
        break;
    case 2:
    case 6:
    case 10:
    case 14:
    case 18:
    case 22:
    case 26:
    case 30:
        echo "Specs are avaliable";
        break;
    case 3:
    case 7:
    case 11:
    case 15:
    case 19:
    case 23:
    case 27:
    case 31:
        echo "Mugs are avaliable";
        break;
    case 4:
    case 8:
    case 12:
    case 16:
    case 20:
    case 24:
    case 28:
        echo "Specs and sausage rolls are avaliable";
        break;
}


echo ". ", date("d");

?>