<?php
// Contrôle taille maximal des champs.
$size = [['nom'=>'id_Faction', 'max'=>10],
        ['nom'=>'typeArme', 'max'=>1],
        ['nom'=>'nomArme', 'max'=>60],
        ['nom'=>'description', 'max'=>600],
        ['nom'=>'puissance', 'max'=>1],
        ['nom'=>'range', 'max'=>3],
        ['nom'=>'gabarit', 'max'=>1]];
if(tailleDesChamps($_POST, $size)) {
  $insert = "INSERT INTO `armes`(`id_Faction`, `nomArme`, `description`, `range`, `puissance`, `typeArme`, `gabarit`)
  VALUES (:id_Faction, :nomArme, :description, :range, :puissance, :typeArme, :gabarit)";
    $parametre = new Preparation();
    $param = $parametre->creationPrep ($_POST);
      $action = new RCUD($insert, $param);
      $action->CUD();
  header('location:../index.php?message=Arme enregistré.&idNav='.$idNav);
} else {
  header('location:../index.php?message=Certain champs sont trop grand.&idNav='.$idNav);
}
