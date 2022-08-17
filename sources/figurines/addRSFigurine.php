<?php
include 'sources/figurines/lireFigurine.php';
        if($dataRSFigurine != []){
        echo '<h3>Règles spéciale déjà affectées</h3>';
        $regleSpecial->affecterRSFigurine($dataRSFigurine, $idNav, $idFigurine, 0);
      }
      echo '<h3>Règles spéciale que vous pouvez affectées</h3>';
      $regleSpecial->affecterRSFigurine($dataRS, $idNav, $idFigurine, 1);
