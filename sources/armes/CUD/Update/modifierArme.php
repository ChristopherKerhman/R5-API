<?php
// Contrôle taille maximal des champs.
$size = [['nom'=>'id_Faction', 'max'=>10],
        ['nom'=>'typeArme', 'max'=>1],
        ['nom'=>'nomArme', 'max'=>60],
        ['nom'=>'description', 'max'=>600],
        ['nom'=>'puissance', 'max'=>1],
        ['nom'=>'range', 'max'=>3],
        ['nom'=>'gabarit', 'max'=>1],
        ['nom'=>'surPuissance', 'max'=>1]];
if(tailleDesChamps($_POST, $size)) {
  $update = "UPDATE `armes` SET `id_Faction`=:id_Faction,`nomArme`=:nomArme,
    `description`=:description,`range`=:range,`puissance`=:puissance,`surPuissance`=:surPuissance,
    `typeArme`=:typeArme,`couverture`=:couverture,`cadenceTir`=:cadenceTir,
    `gabarit`=:gabarit
  WHERE `idArme` = :idArme";
    $parametre = new Preparation();
    $param = $parametre->creationPrep ($_POST);
      $action = new RCUD($update, $param);
      $action->CUD();
  header('location:../index.php?message=Arme enregistré.&idNav='.$idNav.'&idArme='.filter($_POST['idArme']));
} else {
  header('location:../index.php?message=Certain champs sont trop grand.&idNav='.$idNav.'&idArme='.filter($_POST['idArme']));
}
