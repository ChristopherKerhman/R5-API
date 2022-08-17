<?php
include 'sources/figurines/lireFigurine.php';
// Liste des armes en fonction de la faction de la figurine
$readArmes = new PrintArmes();
$dataArmes = $readArmes->getArmeByFaction($dataFigurine[0]['faction']);
echo '<h3>Dotation armes</h3>';
$readArmes->addArme($dataArmes, $idNav, $idFigurine, 0);
echo '<h3>Suppression armes</h3>';
$readArmes->addArme($dataArmesFigurine, $idNav, $idFigurine, 1);
