<?php
include 'APIHeader.php';
require '../calculs/objets/prix.php';
$idFigurine = filter($_GET['idFigurine']);
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
  $selectArray = ["SELECT `idFigurine`, `faction`, `role`, `taille`, `DC`, `DQM`, `mouvement`, `svg`, `pdv`, `vol`, `volStation`, `figurineValide`, `nomFigurine`, `texteFigurine`, `nomFaction`, `nomUnivers`
FROM `figurines`
INNER JOIN `factions` ON `idFaction` = `faction`
INNER JOIN `univers` ON `idUnivers` = `id_Univers`
WHERE `idFigurine` = :idFigurine",
"SELECT `nomRS`
FROM `RS_Figurine`
INNER JOIN `reglesSpeciales` ON `id_RS` = `idRS`
WHERE `id_Figurine` = :idFigurine
ORDER BY `nomRS`"];
$param = [['prep'=>':idFigurine', 'variable'=>$idFigurine]];
$dataFinal = array();
for ($i=0; $i <count($selectArray) ; $i++) {
  $readFigurine = new RCUD($selectArray[$i], $param);
  $dataFigurine = $readFigurine->READ();
  array_push($dataFinal, $dataFigurine);
}

// Récupération des données des armes de la figurine.
$select = "SELECT `idArme`, `nomArme`, `description`, `range`, `puissance`, `surPuissance`, `typeArme`, `couverture`, `cadenceTir`, `gabarit`
FROM `Armes_Figurine`
INNER JOIN `armes` ON `idArme` = `id_Arme`
WHERE `id_Figurine` = :idFigurine AND `armes`.`valide` = 1
ORDER BY `nomArme`";
$readArmes = new RCUD($select, $param);
$dataArmes = $readArmes->READ();
// Lecture des RS des armes
$select = "SELECT `nomRS`
FROM `ArmesRS`
INNER JOIN `reglesSpeciales` ON `id_RS` = `idRS`
WHERE `id_Arme` = :idArme
ORDER BY `nomRS`";
for ($i=0; $i <count($dataArmes) ; $i++) {
  $param = [['prep'=>':idArme', 'variable'=>$dataArmes[$i]['idArme']]];
  $readRSArme = new RCUD($select, $param);
  $buffer = $readRSArme->READ();
  array_push($dataArmes[$i], $buffer);
}
array_push($dataFinal, $dataArmes);
echo json_encode($dataFinal);

} else {
    echo json_encode(['error' => 'Aucune donnée']);
}
