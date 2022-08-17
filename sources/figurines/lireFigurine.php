<?php
include 'sources/figurines/librairieObjet.php';
  $idFigurine =  filter($_GET['idFigurine']);
  $prixFigurine =new PrixFigurine($idFigurine);
  $prixF = $prixFigurine->coefFigurine();
    //Lister les éléments basiques de la figurine
    $figurine = new PrintFigurine();
    $dataFigurine = $figurine->getOneFigurine($idFigurine, 1);
    $dataRSFigurine = $figurine->getParamOneFigurine($idFigurine, 0);
    $dataArmesFigurine = $figurine->getParamOneFigurine($idFigurine, 1);
    $figurine->figurineComplet ($dataFigurine, $dataArmesFigurine, $dataRSFigurine, $prixF);
