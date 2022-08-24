<?php
require 'sources/univers/objets/getUF.php';
require 'sources/univers/objets/printUF.php';
$idFaction = filter($_GET['idFaction']);
$findFaction = new PrintUF();
$nomFaction = $findFaction->oneFaction ($idFaction)
 ?>
 <form class="formulaireClassique" action="<?=encodeRoutage(35)?>" method="post">
   <label for="nomFaction">Nom de la faction</label>
   <input id="nomFaction" type="text" name="nomFaction" value="<?=$nomFaction[0]['nomFaction']?>" required>
   <label for="id_Univers">Univers ?</label>
   <select id="id_Univers" name="id_Univers">
     <?php
      $dataTraiter = $findFaction->lectureUnivers(1);
      $findFaction->optionUnivers($dataTraiter);
      ?>
   </select>
   <input type="hidden" name="idFaction" value="<?=$idFaction?>">
 <button type="submit" name="idNav" value="<?=$idNav?>">Modifier la faction</button>
 </form>
