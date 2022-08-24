<?php
$size = [['nom'=>'nomFaction', 'max'=>80]];
foreach ($size as $key => $value) {
    array_push($controleForm, sizePost(filter($_POST[$value['nom']]), $value['max']));
}
if($controleForm == [0, 0]) {
  $parametre = new Preparation();
  $param = $parametre->creationPrep ($_POST);
  $insert = "UPDATE `factions` SET `nomFaction`=:nomFaction,`id_Univers`=:id_Univers WHERE `idFaction` = :idFaction";
  $action = new RCUD($insert, $param);
  $action->CUD();
  print_r($_POST['idFaction']);
  header('location:../index.php?message=Faction modifiée&idNav='.$idNav.'&idFaction='.filter($_POST['idFaction']));
} else {
    header('location:../index.php?idNav='.$idNav.'&message=Erreur de traitement');
}
