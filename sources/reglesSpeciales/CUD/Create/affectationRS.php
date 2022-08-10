<?php
  $crossRoads = filter($_POST['addRS']);
  array_shift($_POST);
$parametre = new Preparation();
$param = $parametre->creationPrep($_POST);
if($crossRoads == 1) {
  // Contrôle des doublons
  $select =  "SELECT `idArmeRS` FROM `ArmesRS` WHERE `id_RS` = :id_RS AND `id_Arme` = :id_Arme";
  $doublon = new RCUD($select, $param);
  $controle = $doublon->READ();
    if($controle == []){
      $requetteSQL = "INSERT INTO `ArmesRS`(`id_RS`, `id_Arme`) VALUES (:id_RS, :id_Arme)";
      $message = "Règle spéciale enregistré";
    } else {
      $message = "Règle déjà affectée";
    }
} else {
  $controle = array();
  $requetteSQL = "DELETE FROM `ArmesRS` WHERE `id_RS` = :id_RS AND `id_Arme` = :id_Arme";
  $message = "Règle spéciale effacé";
}
  if($controle == []){
    $action = new RCUD($requetteSQL, $param);
    $action->CUD();
  }
header('location:../index.php?idNav='.$idNav.'&idArme='.filter($_POST['id_Arme']).'&message='.$message);
