<?php
require_once('Animals.php');
require_once('Ape.php');
require_once('Frog.php');

$sheep = new Animals("shaun");

echo $sheep->name; // "shaun"
echo "<br>";
echo $sheep->legs; // 4
echo "<br>";
echo $sheep->cold_blooded; // "no"
echo "<br>";
echo "==================================== <br>";
$sungokong = new Ape("kera sakti");
echo $sungokong->name . "<br>";
echo $sungokong->legs . "<br>";
echo $sungokong->cold_blooded . "<br>";
echo $sungokong->yell() . "<br>"; // "Auooo"
echo "==================================== <br>";

$kodok = new Frog("buduk");
echo $kodok->name . "<br>";
echo $kodok->legs . "<br>";
echo $kodok->cold_blooded . "<br>";
echo $kodok->jump(); // "hop hop"

?>