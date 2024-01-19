<?php
echo "<h3>Switch case - day of week<h3>";

$day=6;
switch ($day) {
    case 1:
        echo "Monday";
        break;
    case 2:
        echo "Tuesday";
        break;
    case 3:
        echo "wednesday";
        break;
    case 4:
        echo "thursday";
        break;
    case 5:
        echo "friday";
        break;
    case 6:
        echo "saturday";
        break;
    case 7:
        echo "waw...! its sunday. enjoy for holiday";
        break;
    default:
        echo " invalid day";
        break;

}
?>