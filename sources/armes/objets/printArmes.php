<?php
Class PrintArmes extends GetArmes {
  public function addArmes() {
      echo '<form class="formulaireClassique" action="'.encodeRoutage(22).'" method="post">
      <label for="typeArme">Type d\'arme ?</label>
      <select id="typeArme" name="typeArme">';
        for ($i=0; $i <count($this->typeArmes) ; $i++) {
          echo '<option value="'.$i.'">'.$this->typeArme[$i].'</option>'
        }
  echo'</select>
  <button type="submit" name="idNav" value="'.$idNav.'">Créer un emplacement</button>
  </form>';
  }
}
