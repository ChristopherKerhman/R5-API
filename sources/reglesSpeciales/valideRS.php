<?php
  require 'sources/reglesSpeciales/objets/getRS.php';
  require 'sources/reglesSpeciales/objets/printRS.php';
// Liste règles spécialesnon valide
$valide = 1;
$regle = new printReglesSpecial();
echo '<article><h4>Liste des règles spéciale classé par type</h4>';
$dataRSArmes = $regle->getRSparType(0, $valide);
  if($dataRSArmes != []){
    echo '<h5>Règle spéciale des armes</h5>';
    $regle->affichageNomRS($dataRSArmes);
}
$dataRSFigurines = $regle->getRSparType(1, $valide);
  if($dataRSFigurines != []){
    echo '<h5>Règle spéciale des Figurines</h5>';
    $regle->affichageNomRS($dataRSFigurines);
}
$dataRSVehicule = $regle->getRSparType(2, $valide);
  if($dataRSVehicule != []){
    echo '<h5>Règle spéciale des Véhicules</h5>';
    $regle->affichageNomRS($dataRSVehicule);
}
echo '</article>';
