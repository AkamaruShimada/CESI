<?php

include_once "./autoload.php";

use Aka\exo\AdvancedString;
use Aka\exo\Point;

$msg = new AdvancedString('Lol');
$msg->bold();
echo "<br>";
$msg->italic();
echo "<br>";
$msg = new AdvancedString;
$msg->underline();
echo "<br>";
$msg->upperCase();

echo "<br>";
echo "<br>";

$pts = new Point();
$pts->__toString();
?>