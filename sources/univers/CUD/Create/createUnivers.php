<?php
// Contrôle de la taille maximal des champs
$size = [['nom'=>'nomUnivers', 'max'=>60], ['nom'=>'NT', 'max'=>1]];
foreach ($size as $key => $value) {
    array_push($controleForm, sizePost(filter($_POST[$value['nom']]), $value['max']));
}
$ok = array();
for ($i=0; $i < 3 ; $i++) {
  array_push($ok, 0);
}
if($controleForm == $ok) {
  // Enregistrement du nouvelle univers
  $insert = "INSERT INTO `univers`(`nomUnivers`, `NT`) VALUES (:nomUnivers, :NT)";
  $parametre = new Preparation();
  $param = $parametre->creationPrep ($_POST);
  $action = new RCUD($insert, $param);
  $action->CUD();
  header('location:../index.php?idNav='.$idNav.'&message=Votre nouvel univers '.filter($_POST['nomUnivers'].' est créé'));
} else {
  header('location:../index.php?idNav='.$idNav.'&message=Erreur de traitement');
}
