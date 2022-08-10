<?php
//Coefficient de l'arme
require 'sources/calculs/objets/prix.php';
$prixArme = new Prix ($idArme);
$coef = $prixArme->coefArme();
