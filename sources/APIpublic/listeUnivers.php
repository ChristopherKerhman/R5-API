<?php
include 'APIHeader.php';
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
  // Requête
  $select = "SELECT `idUnivers`, `nomUnivers`, `NT` FROM `univers` WHERE `valide` = 1";
              $param = array();
  $readData = new RCUD($select, $param);
  $dataUnivers = $readData->READ();
  $data_Univers_JSON = JSON_encode($dataUnivers);
  echo $data_Univers_JSON;
} else {
  echo json_encode(['error' => 'Aucune donnée']);
}
