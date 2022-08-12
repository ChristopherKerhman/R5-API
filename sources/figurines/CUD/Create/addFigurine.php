<?php
print_r($_POST);
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
    $insert = "INSERT INTO `figurines`
    ( `faction`, `role`, `taille`, `DC`, `DQM`, `mouvement`, `svg`, `pdv`, `vol`, `volStation`, `nomFigurine`, `texteFigurine`)
    VALUES (:faction, :role, :taille, :DC, :DQM, :mouvement, :svg, :pdv, :vol, :volStation, :nomFigurine, :texteFigurine)";
      $parametre = new Preparation();
      $param = $parametre->creationPrep ($_POST);
        $action = new RCUD($insert, $param);
        $action->CUD();
    header('location:../index.php?message=Figurine enregistrée.&idNav='.$idNav);
  } else {
    header('location:../index.php?message=Certain champs sont trop grand.&idNav='.$idNav);
  }
