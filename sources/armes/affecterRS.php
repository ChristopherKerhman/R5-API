<?php
  include 'sources/armes/lireArme.php';
  if($dataRS != []) {
    echo '<h3>Les régles spéciales actuellement valide pour cette arme.</h3>';
  //  $reglesSpeciales->delRSArme ($dataRS, $idNav, $idArme);
    $reglesSpeciales->affecterRS($dataRS, $idNav, $idArme, 0);
  }

  echo '<h3>Liste de toutes les règles spéciales </h3>';
  $reglesSpeciales->affecterRS($dataRSArme, $idNav, $idArme, 1);
