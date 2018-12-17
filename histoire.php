<?php
require vampire.php;
require ecolier.php;
require guerriere.php;
require sac.php;
require epee.php;


$henri = new Ecolier();
$vlad = new Vampire ();
$anna = new Guerriere ();
$sac= new Cartable();
$henri->setSac($sac);
$henri->marcher ();

$épée = new Epée();
$anna->setArme ($epee);

$vlad->sauter();
$anna->combattre;
$anna->getArme£()->utiliser();

$vlad->courir();




?>





