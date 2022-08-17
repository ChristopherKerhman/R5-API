<?php
$size = [
        ['nom'=>'faction', 'max'=>10],
        ['nom'=>'role', 'max'=>1],
        ['nom'=>'nomFigurine', 'max'=>80],
        ['nom'=>'texteFigurine', 'max'=>600],
        ['nom'=>'DC', 'max'=>1],
        ['nom'=>'DQM', 'max'=>1],
        ['nom'=>'taille', 'max'=>1],
        ['nom'=>'svg', 'max'=>1],
        ['nom'=>'pdv', 'max'=>1],
        ['nom'=>'mouvement', 'max'=>2],
        ['nom'=>'vol', 'max'=>1],
        ['nom'=>'volStation', 'max'=>1]];

  if(tailleDesChamps($_POST, $size)) {
    $update = "UPDATE `figurines` SET `faction`=:faction,`role`=:role,`taille`=:taille,`DC`=:DC,`DQM`=:DQM,
    `mouvement`=:mouvement,`svg`=:svg,`pdv`=:pdv,`vol`=:vol,
    `volStation`=:volStation, `nomFigurine`=:nomFigurine, `texteFigurine`=:texteFigurine
    WHERE `idFigurine` = :idFigurine";
      $parametre = new Preparation();
      $param = $parametre->creationPrep ($_POST);
      print_r($param);
        $action = new RCUD($update, $param);
        $action->CUD();
    header('location:../index.php?message=Figurine modifiée.&idNav='.$idNav.'&idFigurine='.filter($_POST['idFigurine']));
  } else {
    header('location:../index.php?message=Certain champs sont trop grand.&idNav='.$idNav);
  }
