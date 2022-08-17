<?php
$sql = [["req"=>"INSERT INTO `Armes_Figurine`(`id_Arme`, `id_Figurine`) VALUES (:id_Arme, :id_Figurine)", "message"=>"Arme dotée"],
["req"=>"DELETE FROM `Armes_Figurine` WHERE `id_Arme` = :id_Arme AND `id_Figurine` = :id_Figurine", "message"=>"Arme supprimée"]];
$index =  filter($_POST['cross']);
if(($index < 0)||($index >1)) {
  header('location:../index.php?idNav='.$idNav.'&idFigurine='.filter($_POST['id_Figurine']).'&message=Erreur de traitement');
} else {
  $requette = $sql[$index]['req'];
  array_shift($_POST);
  $parametre = new Preparation();
  $param = $parametre->creationPrep($_POST);
  $action = new RCUD($requette, $param);
  $action->CUD();
  print_r($_POST['id_Figurine']);
  header('location:../index.php?idNav='.$idNav.'&idFigurine='.filter($_POST['id_Figurine']).'&message='.$sql[$index]['message']);
}
