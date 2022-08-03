<?php
$parametre = new Preparation();
$param = $parametre->creationPrep ($_POST);
$update = "UPDATE `factions` SET `valide`= 1 WHERE `idFaction` = :idFaction";
$action = new RCUD($update, $param);
$action->CUD();
header('location:../index.php?idNav='.$idNav.'&message=Faction supprimée');
