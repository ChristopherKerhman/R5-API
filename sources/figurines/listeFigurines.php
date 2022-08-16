<?php

  include 'sources/figurines/librairieObjet.php';
  $figurines = new PrintFigurine();
 ?>
 <form class="" action="<?php filter($_SERVER["PHP_SELF"]); ?>" method="post">
   <label for="id_Faction">Figurines de la faction ?</label>
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
  $requetteSQL = "SELECT COUNT(`idFigurine`) AS `nbr` FROM `figurines` WHERE `figurineValide` = 1 AND `faction` = :id_Faction";
} else {
  $param = [];
  $requetteSQL = "SELECT COUNT(`idFigurine`) AS `nbr` FROM `figurines` WHERE `figurineValide` = 1 ";
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
$nbrArticle = $dataNbrC[0]['nbr'];
// nombre de page total arrondit au chiffre suppérieur.
$pages = ceil($nbrArticle/$parPage);
// Calcul du premier article dans la page.
$premier = ($currentPage * $parPage) - $parPage;
// Tri
if ($_SERVER['REQUEST_METHOD'] === 'POST'){
  $dataFigurines = $figurines->getFigurines(1, $premier, $parPage, $tri);
} else {
  $dataFigurines = $figurines->getAllFigurines(1, $premier, $parPage);
}
//Fin tri
// Affichage
$figurines->tableauFigurine($dataFigurines, $currentPage);
//Fin affichage
// Naviger dans la Pagination
for ($page=1; $page <= $pages ; $page++ ) {
  echo '<a class="lienNav" href="index.php?idNav='.$idNav.'&page='.$page.'">'.$page.'</a>';
}
