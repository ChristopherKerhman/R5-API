<?php
$idArme = filter($_GET['idArme']);
require 'sources/armes/objets/getArmes.php';
require 'sources/armes/objets/printArmes.php';
require 'sources/reglesSpeciales/objets/getRS.php';
require 'sources/reglesSpeciales/objets/printRS.php';
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
