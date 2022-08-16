<?php
  include 'sources/figurines/librairieObjet.php';
    $idFigurine =  filter($_GET['idFigurine']);
      //Lister les éléments basiques de la figurine
      $figurine = new PrintFigurine();
      $dataFigurine = $figurine->getOneFigurine($idFigurine, 1);
      $dataRSFigurine = $figurine->getParamOneFigurine($idFigurine, 0);
      $dataArmesFigurine = $figurine->getParamOneFigurine($idFigurine, 1);
      $figurine->figurineComplet ($dataFigurine, $dataArmesFigurine, $dataRSFigurine);
      $regleSpecial = new printReglesSpecial();
      $dataRS = $regleSpecial->getAffectationRS_Figurine($idFigurine);
        if($dataRSFigurine != []){
        echo '<h3>Règles spéciale déjà affectées</h3>';
        $regleSpecial->affecterRSFigurine($dataRSFigurine, $idNav, $idFigurine, 0);
      }
      echo '<h3>Règles spéciale que vous pouvez affectées</h3>';
      $regleSpecial->affecterRSFigurine($dataRS, $idNav, $idFigurine, 1);
