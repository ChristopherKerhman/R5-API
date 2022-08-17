<?php
// Recherche de la figurine a Cloner
$select ="SELECT `faction`, `role`, `taille`, `DC`, `DQM`, `mouvement`, `svg`, `pdv`, `vol`, `volStation`, `nomFigurine`, `texteFigurine`
FROM `figurines`
WHERE `idFigurine`=:idFigurine";
  $parametre = new Preparation();
  $param = $parametre->creationPrep ($_POST);
    $readBouture = new RCUD($select, $param);
    $dataBouture = $readBouture->READ();
    $dataBouture = $dataBouture[0];
    $param = array();
    foreach ($dataBouture as $key => $value) {
      $construction = ['prep'=>':'.$key, 'variable'=>$value];
      array_push($param, $construction);
    }
$insert = "INSERT INTO `figurines`(`faction`, `role`, `taille`, `DC`, `DQM`, `mouvement`, `svg`, `pdv`, `vol`, `volStation`,  `nomFigurine`, `texteFigurine`)
VALUES (:faction, :role, :taille, :DC, :DQM, :mouvement, :svg, :pdv, :vol, :volStation,  :nomFigurine, :texteFigurine)";
$action = new RCUD($insert, $param);
$action->CUD();
    header('location:../index.php?message=Figurine clonée.&idNav='.$idNav.'&idFigurine='.filter($_POST['idFigurine']));
