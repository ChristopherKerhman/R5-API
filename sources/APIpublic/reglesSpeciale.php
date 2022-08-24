<?php
include 'APIHeader.php';
$typeRS = filter($_GET['typeRS']);
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
  // Requête
  $select = "SELECT `idRS`, `nomRS`, `texteRS` FROM `reglesSpeciales` WHERE `typeRS` = :typeRS ORDER BY `nomRS`";
              $param = [['prep'=>':typeRS', 'variable'=>$typeRS]];
  $readData = new RCUD($select, $param);
  $dataUnivers = $readData->READ();
  $data_Univers_JSON = JSON_encode($dataUnivers);
  echo $data_Univers_JSON;
} else {
  echo json_encode(['error' => 'Aucune donnée']);
}
