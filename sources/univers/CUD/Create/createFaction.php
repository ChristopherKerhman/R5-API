<?php
$size = [['nom'=>'nomFaction', 'max'=>80]];
foreach ($size as $key => $value) {
    array_push($controleForm, sizePost(filter($_POST[$value['nom']]), $value['max']));
}
if($controleForm == [0, 0]) {
  $parametre = new Preparation();
  $param = $parametre->creationPrep ($_POST);
  $insert = "INSERT INTO `factions`( `nomFaction`, `id_Univers`)
  VALUES (:nomFaction, :id_Univers)";
  $action = new RCUD($insert, $param);
  $action->CUD();
    header('location:../index.php?idNav='.$idNav.'&message=Votre nouvelle faction '.filter($_POST['nomFaction'].' est créé'));
} else {
    header('location:../index.php?idNav='.$idNav.'&message=Erreur de traitement');
}
