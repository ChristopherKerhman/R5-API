<?php
  $idArme = filter($_GET['idArme']);
  require 'sources/armes/objets/getArmes.php';
  require 'sources/armes/objets/printArmes.php';
  $armes = new PrintArmes();
  $dataArme= $armes->uneArme(1, $idArme);
  $armes->afficherUneArme($dataArme);
