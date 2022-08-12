<?php
  require 'functions/functionPagination.php';
  require 'sources/armes/objets/getArmes.php';
  require 'sources/armes/objets/printArmes.php';
//  require 'sources/univers/objets/getUF.php';
//  require 'sources/univers/objets/printUF.php';
  $armes = new PrintArmes();
  ?>
  <form class="" action="<?php filter($_SERVER["PHP_SELF"]); ?>" method="post">
    <label for="id_Faction">Arme de la faction ?</label>
    <select id="id_Faction" name="id_Faction">
      <?php
        $factions = new PrintUF();
        $dataFactions = $factions->listeFactions(1);
        $factions->selectFaction($dataFactions);
       ?>
    </select>
    <button class="buttonForm" type="submit" name="button">Tri ?</button>
  </form>
  <?php
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $tri = filter($_POST['id_Faction']);
    $param = [['prep'=>':id_Faction', 'variable'=>$tri]];
    $requetteSQL = "SELECT COUNT(`idArme`) AS `nbrArme` FROM `armes` WHERE `valide` = 1 AND `id_Faction` = :id_Faction";
  } else {
    $param = [];
    $requetteSQL = "SELECT COUNT(`idArme`) AS `nbrArme` FROM `armes` WHERE `valide` = 1";
  }
  // Paramètre de pagination
  if(isset($_GET['page']) && (!empty($_GET['page']))) {
    $currentPage = filter($_GET['page']);
  } else {
  $currentPage = 1;
  }
  $parPage = 10;
  // Affichage
  $nrbC = new RCUD($requetteSQL, $param);
  $dataNbrC = $nrbC->READ();
  $nbrArticle = $dataNbrC[0]['nbrArme'];
  // nombre de page total arrondit au chiffre suppérieur.
  $pages = ceil($nbrArticle/$parPage);
  //print_r($pages);
  // Calcul du premier article dans la page.
  $premier = ($currentPage * $parPage) - $parPage;
  if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $dataArmes = $armes->getArmes(1, $premier, $parPage, $tri);
  } else {
    $dataArmes = $armes->getAllArmes(1, $premier, $parPage);
  }
  // Affichage
  $armes-> Ratellier($dataArmes, $currentPage);
  // Naviger dans la Pagination
  for ($page=1; $page <= $pages ; $page++ ) {
    echo '<a class="lienNav" href="index.php?idNav='.$idNav.'&page='.$page.'">'.$page.'</a>';
  }
