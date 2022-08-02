<?php
print_r($_POST);
$insert = "INSERT INTO `reglesSpeciales`(`nomRS`, `texteRS`, `prixRS`, `typeRS`)
VALUES (:nomRS, :texteRS, :prixRS, :typeRS) ";
$parametre = new Preparation();
$param = $parametre->creationPrep ($_POST);
$action = new RCUD($insert, $param);
$action->CUD();
header('location:../index.php?idNav='.$idNav.'&message=Nouvelle règle spéciale enregistrée.');
