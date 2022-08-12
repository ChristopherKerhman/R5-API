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
  echo '<section>';
   $armes->updateArmes($dataArme, $idNav);
  echo'</section>';
