<?php
$idRS = filter($_GET['idRS']);
require 'sources/reglesSpeciales/objets/getRS.php';
require 'sources/reglesSpeciales/objets/printRS.php';
$readRS = new printReglesSpecial();
$dataTraiter = $readRS->getOneRS ($idRS);
$readRS->printOneRS ($dataTraiter);
