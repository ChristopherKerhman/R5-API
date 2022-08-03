<?php
  require 'sources/univers/objets/getUF.php';
  require 'sources/univers/objets/printUF.php';
  $data = new PrintUF();
 ?>
<h3>Créer un nouvel univers</h3>
<form class="formulaireClassique" action="<?=encodeRoutage(23)?>" method="post">
  <label for="nomUnivers">Nom de votre univers</label>
  <input id="nomUnivers" type="text" name="nomUnivers" required>
  <label for="NT">Type de technologie ?</label>
  <select id="NT" name="NT">
    <?php
      $NT = $data->array_NT();
      for ($i=0; $i <count($NT) ; $i++) {
        echo '<option value="'.$i.'">'.$NT[$i].'</option>';
      }
     ?>
  </select>
<button type="submit" name="idNav" value="<?=$idNav?>">Créer un emplacement</button>
</form>
