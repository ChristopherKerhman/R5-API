<?php
  require 'functions/functionPagination.php';
  require 'sources/armes/objets/getArmes.php';
  require 'sources/armes/objets/printArmes.php';
  $armes = new PrintArmes();
  // Paramètre de pagination
  if(isset($_GET['page']) && (!empty($_GET['page']))) {
    $currentPage = filter($_GET['page']);
  } else {
  $currentPage = 1;
  }
  $parPage = 10;
  // Déclaration de paramètre vide :
  $param = [];
  // Recherche des connexions aux sites
  $requetteSQL = "SELECT COUNT(`idArme`) AS `nbrArme` FROM `armes` WHERE `valide` = 1";
  $nrbC = new RCUD($requetteSQL, $param);
  $dataNbrC = $nrbC->READ();
  $nbrArticle = $dataNbrC[0]['nbrArme'];
  // nombre de page total arrondit au chiffre suppérieur.
  $pages = ceil($nbrArticle/$parPage);
  //print_r($pages);
  // Calcul du premier article dans la page.
  $premier = ($currentPage * $parPage) - $parPage;
  $dataArmes = $armes->getArmes(1, $premier, $parPage);
  // Affichage
  $armes-> Ratellier($dataArmes, $currentPage);
  // Naviger dans la Pagination
  for ($page=1; $page <= $pages ; $page++ ) {
    echo '<a class="lienNav" href="index.php?idNav='.$idNav.'&page='.$page.'">'.$page.'</a>';
  }
