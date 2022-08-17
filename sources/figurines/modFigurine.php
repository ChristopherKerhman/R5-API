<?php
echo '<h3>Modifier une figurine</h3>';
include 'sources/figurines/lireFigurine.php';
    $figurine->modFigurine($dataFigurine, $idNav);
    $figurine->cloneFigurine($idFigurine, $idNav);
