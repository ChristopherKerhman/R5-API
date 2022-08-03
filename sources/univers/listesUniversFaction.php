<?php
  require 'sources/univers/objets/getUF.php';
  require 'sources/univers/objets/printUF.php';
  $data = new PrintUF();
  $liste = $data->listeFactions(1);
  if($liste != []) {
    echo '<h3>Faction actuellement valide</h3>';
  $data->administrationFaction ($liste, $idNav);
  }
    $listeUnValide = $data->listeFactions(0);
    if($listeUnValide != []) {
      echo '<h3>Faction actuellement Non valide</h3>';
    $data->administrationFaction ($listeUnValide, $idNav);
    }
