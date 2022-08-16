<?php
  $crossRoads = filter($_POST['addRS']);
  array_shift($_POST);
$parametre = new Preparation();
$param = $parametre->creationPrep($_POST);
if($crossRoads == 1) {
  // Contrôle des doublons
  $select =  "SELECT `idRSF` FROM `RS_Figurine` WHERE `id_RS` = :id_RS AND `id_Figurine` = :id_Figurine";
  $doublon = new RCUD($select, $param);
  $controle = $doublon->READ();
    if($controle == []){
      $requetteSQL = "INSERT INTO `RS_Figurine`(`id_RS`, `id_Figurine`) VALUES (:id_RS, :id_Figurine)";
      $message = "Règle spéciale enregistré";
    } else {
      $message = "Règle déjà affectée";
    }
} else {
  $controle = array();
  $requetteSQL = "DELETE FROM `RS_Figurine` WHERE `id_RS` = :id_RS AND `id_Figurine` = :id_Figurine";
  $message = "Règle spéciale effacé";
}
  if($controle == []){
    $action = new RCUD($requetteSQL, $param);
    $action->CUD();
  }
header('location:../index.php?idNav='.$idNav.'&idFigurine='.filter($_POST['id_Figurine']).'&message='.$message);
