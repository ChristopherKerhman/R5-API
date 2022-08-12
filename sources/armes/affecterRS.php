<?php
  $idArme = filter($_GET['idArme']);
  require 'sources/armes/librairieObjet.php';
  include 'sources/calculs/calculArmes.php';
  $reglesSpeciales = new printReglesSpecial();
  $dataRSArme = $reglesSpeciales->getAffectationRS($idArme);
  $armes = new PrintArmes();
  $dataArme= $armes->uneArme(1, $idArme);
  $dataRS = $armes->getRSUneArme ($idArme);
  $armes->afficherUneArme($dataArme, $dataRS, $coef);

  if($dataRS != []) {
    echo '<h3>Les régles spéciales actuellement valide pour cette arme.</h3>';
    $reglesSpeciales->delRSArme ($dataRS, $idNav, $idArme);
  }

  echo '<h3>Liste de toutes les règles spéciales </h3>';
  $reglesSpeciales->affecterRS($dataRSArme, $idNav, $idArme, $dataRS);
