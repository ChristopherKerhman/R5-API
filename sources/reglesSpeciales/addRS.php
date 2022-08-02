<?php
require 'sources/reglesSpeciales/objets/getRS.php';
require 'sources/reglesSpeciales/objets/printRS.php';
$formRS = new printReglesSpecial();
$formRS->formADDRS ($idNav, 20);
echo '<article><h4>Liste des règles spéciale classé par type</h4>';
$dataRSArmes = $formRS->getRSparType(0, 1);
  if($dataRSArmes != []){
    echo '<h5>Règle spéciale des armes</h5>';
    $formRS->affichageNomRS($dataRSArmes);
}
$dataRSFigurines = $formRS->getRSparType(1, 1);
  if($dataRSFigurines != []){
    echo '<h5>Règle spéciale des Figurines</h5>';
    $formRS->affichageNomRS($dataRSFigurines);
}
$dataRSVehicule = $formRS->getRSparType(2, 1);
  if($dataRSVehicule != []){
    echo '<h5>Règle spéciale des Véhicules</h5>';
    $formRS->affichageNomRS($dataRSVehicule);
}
echo '</article>';
