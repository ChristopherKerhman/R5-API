<?php
include 'APIHeader.php';
require '../calculs/objets/prix.php';
$idFaction = filter($_GET['idFaction']);
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
  // Requête
  // Trie figurine
  $select = "SELECT `idFigurine`, `faction`, `role`, `taille`, `DC`, `DQM`, `mouvement`, `svg`, `pdv`, `vol`, `volStation`, `nomFigurine`, `texteFigurine`
              FROM `figurines`
              WHERE `faction` = :idFaction AND `figurineValide` = 1";
  $param = [['prep'=>':idFaction', 'variable'=>$idFaction]];
  $readFigurines = new RCUD($select, $param);
  $dataFigurines = $readFigurines->READ();
  $toutesFigurineUnFaction = array();
  for ($i=0; $i <count($dataFigurines) ; $i++) {
    $prixFigurine = new PrixFigurine($dataFigurines[$i]['idFigurine']);
    $prix = ['prixFigurine'=>$prixFigurine->coefFigurine ()];
    array_push($dataFigurines[$i],  $prix);
    $idF = [['prep'=>':id', 'variable'=>$dataFigurines[$i]['idFigurine']]];
    //Recherche RS
    $selectRS = "SELECT `nomRS`
    FROM `RS_Figurine`
    INNER JOIN `reglesSpeciales` ON `id_RS` = `idRS`
    WHERE `id_Figurine` = :id";
    $readRS = new RCUD($selectRS, $idF);
    $dataRS = $readRS->READ();
    array_push($dataFigurines[$i],$dataRS);
    //Recherche Armes
    $selectArmes = "SELECT  `idArme`, `nomArme`, `description`, `range`, `puissance`, `surPuissance`, `typeArme`, `couverture`, `cadenceTir`, `gabarit`
    FROM `Armes_Figurine`
    INNER JOIN `armes` ON `idArme` = `id_Arme`
    WHERE `id_Figurine` = :id";
    $readArmes = new RCUD($selectArmes, $idF);
    $dataArmes = $readArmes->READ();
    for ($j=0; $j <count($dataArmes) ; $j++) {
      $selectRSArme = "SELECT `nomRS`
      FROM `ArmesRS`
      INNER JOIN `reglesSpeciales` ON `id_RS` = `idRS`
      WHERE `id_Arme` = :idArme";
      $paramIdArme = [['prep'=>':idArme', 'variable'=>$dataArmes[$j]['idArme']]];
      $readRSArme = new RCUD($selectRSArme, $paramIdArme);
      $readRSA = $readRSArme->READ();
        array_push($dataArmes[$j],$readRSA);
    }
    array_push($dataFigurines[$i],$dataArmes);
  }
  echo JSON_encode($dataFigurines);
} else {
  echo json_encode(['error' => 'Aucune donnée']);
}
