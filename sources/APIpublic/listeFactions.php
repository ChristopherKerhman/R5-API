<?php
include 'APIHeader.php';
$idUnivers = filter($_GET['idUnivers']);
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
// Requête
$select = "SELECT `idFaction`, `nomFaction` FROM `factions` WHERE `id_Univers` = :idUnivers AND `valide` = 1";
            $param = [['prep'=>':idUnivers', 'variable'=>$idUnivers]];
$readData = new RCUD($select, $param);
$dataFaction = $readData->READ();
$data_Factions_JSON = JSON_encode($dataFaction);
echo $data_Factions_JSON;
} else {
    echo json_encode(['error' => 'Aucune donnée']);
}
