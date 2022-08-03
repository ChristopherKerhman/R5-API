<?php
  require 'sources/univers/objets/getUF.php';
  require 'sources/univers/objets/printUF.php';
  $data = new PrintUF();
 ?>
 <h3>Créer une nouvelle faction</h3>
 <form class="formulaireClassique" action="<?=encodeRoutage(24)?>" method="post">
   <label for="nomFaction">Nom de la faction</label>
   <input id="id_Univers" type="text" name="nomFaction" required>
   <label for="id_Univers">Univers ?</label>
   <select id="id_Univers" name="id_Univers">
     <?php
      $dataTraiter = $data->lectureUnivers(1);
      $data->optionUnivers($dataTraiter);
      ?>
   </select>
 <button type="submit" name="idNav" value="<?=$idNav?>">Créer un emplacement</button>
 </form>
