<?php
$select = "SELECT `idArme`, `id_Faction`, `nomArme`, `description`, `range`, `puissance`,
`surPuissance`, `typeArme`, `couverture`, `cadenceTir`, `gabarit`
FROM `armes` WHERE `idArme` = :idArme";
$parametre = new Preparation();
$param = $parametre->creationPrep ($_POST);
$readOriginal = new RCUD($select, $param);
$dataOriginal = $readOriginal->READ();
  $param = [['prep'=>':id_Faction', 'variable'=>$dataOriginal[0]['id_Faction']],
  ['prep'=>':nomArme', 'variable'=>$dataOriginal[0]['nomArme']],
  ['prep'=>':description', 'variable'=>$dataOriginal[0]['description']],
  ['prep'=>':range', 'variable'=>$dataOriginal[0]['range']],
  ['prep'=>':puissance', 'variable'=>$dataOriginal[0]['puissance']],
  ['prep'=>':surPuissance', 'variable'=>$dataOriginal[0]['surPuissance']],
  ['prep'=>':typeArme', 'variable'=>$dataOriginal[0]['typeArme']],
  ['prep'=>':couverture', 'variable'=>$dataOriginal[0]['couverture']],
  ['prep'=>':cadenceTir', 'variable'=>$dataOriginal[0]['cadenceTir']],
  ['prep'=>':gabarit', 'variable'=>$dataOriginal[0]['gabarit']]];
    $insert = "INSERT INTO `armes`(`id_Faction`, `nomArme`, `description`, `range`, `puissance`, `surPuissance`, `typeArme`,`couverture`, `cadenceTir`, `gabarit`)
    VALUES (:id_Faction, :nomArme, :description, :range, :puissance, :surPuissance, :typeArme, :couverture, :cadenceTir, :gabarit)";
    $action = new RCUD($insert, $param);
    $action->CUD();
header('location:../index.php?message=Arme cloné correctement.&idNav='.$idNav.'&idArme='.filter($_POST['idArme']));
