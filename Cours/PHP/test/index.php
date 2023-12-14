<?php

include_once "./autoload.php";

use Aka\entities\Character;

$player = new Character('Aka', 50);
$player->Kill();
echo "<br>";
$player = new Character();
$player->Kill();

?>