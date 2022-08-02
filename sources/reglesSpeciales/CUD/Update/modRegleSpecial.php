<?php
$update = "UPDATE `reglesSpeciales` SET
            `nomRS`= :nomRS,
            `texteRS`= :texteRS,
            `prixRS`= :prixRS,
            `valideRS`= :valideRS,
            `typeRS`= :typeRS
          WHERE `idRS` = :idRS";
$parametre = new Preparation();
$param = $parametre->creationPrep ($_POST);
$action = new RCUD($update, $param);
$action->CUD();
if(filter($_POST['valideRS']) == 1){
  header('location:../index.php?idNav='.$idNav.'&message=Règle spéciale '.filter($_POST['nomRS']).' modifié&idRS='.filter($_POST['idRS']));
} else {
    header('location:../index.php?message=Règle spéciale '.filter($_POST['nomRS']).' éffacée.');
}
