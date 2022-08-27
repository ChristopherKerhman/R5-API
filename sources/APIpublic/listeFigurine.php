<?php
include 'APIHeader.php';
require '../calculs/objets/prix.php';
$idFaction = filter($_GET['idFaction']);
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
  // Requête
  // Trie figurine
  $select = "SELECT `idFigurine`, `nomFigurine`
              FROM `figurines`
              WHERE `faction` = :idFaction AND `figurineValide` = 1";
  $param = [['prep'=>':idFaction', 'variable'=>$idFaction]];
  $readFigurines = new RCUD($select, $param);
  $dataFigurines = $readFigurines->READ();
  $toutesFigurineUnFaction = array();
  for ($i=0; $i <count($dataFigurines) ; $i++) {
    $prixFigurine = new PrixFigurine($dataFigurines[$i]['idFigurine']);
    $prix = ['prixFigurine'=>round($prixFigurine->coefFigurine (), 0)];
    array_push($dataFigurines[$i],  $prix);
    }
    echo JSON_encode($dataFigurines);
} else {
  echo json_encode(['error' => 'Aucune donnée']);
}
