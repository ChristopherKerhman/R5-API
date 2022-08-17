<?php
include 'sources/figurines/librairieObjet.php';
  $idFigurine =  filter($_GET['idFigurine']);
    //Lister les éléments basiques de la figurine
    $figurine = new PrintFigurine();
    $dataFigurine = $figurine->getOneFigurine($idFigurine, 1);
    $dataRSFigurine = $figurine->getParamOneFigurine($idFigurine, 0);
    $dataArmesFigurine = $figurine->getParamOneFigurine($idFigurine, 1);
    $figurine->figurineComplet ($dataFigurine, $dataArmesFigurine, $dataRSFigurine);
// Liste des armes en fonction de la faction de la figurine
$readArmes = new PrintArmes();
$dataArmes = $readArmes->getArmeByFaction($dataFigurine[0]['faction']);
echo '<h3>Dotation armes</h3>';
$readArmes->addArme($dataArmes, $idNav, $idFigurine, 0);
echo '<h3>Suppression armes</h3>';
$readArmes->addArme($dataArmesFigurine, $idNav, $idFigurine, 1);
