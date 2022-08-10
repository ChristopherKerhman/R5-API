<?php
  $idArme = filter($_GET['idArme']);
  require 'sources/armes/objets/getArmes.php';
  require 'sources/armes/objets/printArmes.php';
  require 'sources/reglesSpeciales/objets/getRS.php';
  require 'sources/reglesSpeciales/objets/printRS.php';
  $reglesSpeciales = new printReglesSpecial();
  $dataRSArme = $reglesSpeciales->getRSparType(0, 1);
  $armes = new PrintArmes();
  $dataArme= $armes->uneArme(1, $idArme);
  $dataRS = $armes->getRSUneArme ($idArme);
  $armes->afficherUneArme($dataArme, $dataRS);
  echo '<h3>Les régles spéciales actuellement valide pour cette arme.</h3>';
  $reglesSpeciales->delRSArme ($dataRS, $idNav, $idArme);
  echo '<h3>Liste de toutes les règles spéciales </h3>';
  $reglesSpeciales->affecterRS($dataRSArme, $idNav, $idArme, $dataRS);
