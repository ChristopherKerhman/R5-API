<?php
require 'sources/univers/objets/getUF.php';
require 'sources/univers/objets/printUF.php';
Class PrintArmes extends GetArmes {
  public function addArmes() {
      $faction = new PrintUF();
      $dataFaction = $faction->listeFactions(1);
      echo '<h3>Ajouter une arme</h3>';
      echo '<form class="formulaireClassique" action="'.encodeRoutage(22).'" method="post">
      <label for="id_Faction">Faction de l\'arme ?</label>
      <select id="id_Faction" name="id_Faction">';
        $faction->selectFaction($dataFaction);
      echo'</select>
      <label for="typeArme">Type d\'arme ?</label>
      <select id="typeArme" name="typeArme">';
        for ($i=0; $i <count($this->typeArmes) ; $i++) {
          echo '<option value="'.$i.'">'.$this->typeArmes[$i].'</option>';
        }
  echo'</select>
  <label for="nomArme">Nom de l\'arme</label>
  <input id="nomArme" type="text" name="nomArme" required/>

  <label for="description">Description de l\'arme</label>
  <textarea id="description" name="description" rows="8" cols="80" required></textarea>
  <div class="formulaireInterne">
    <label for="puissance">Puissance ?</label>
          <select id="puissance" name="puissance">';
          for ($i=0; $i <count($this->puissance) ; $i++) {
            echo  '<option value="'.$i.'">'.$this->puissance[$i].'</option>';
          }
          echo'</select>
        <label for="range">Portée de l\'arme (en pouces)</label>
        <input id="range" name="range" type="number" min="0" max="80" step="1" placeholder="0" required />
        <label for="gabarit">Gabarit</label>
        <select id="gabarit" name="gabarit">';
        for ($i=0; $i <count($this->gabarit) ; $i++) {
          echo '<option value="'.$i.'">'.$this->gabarit[$i].'</option>';
        }
        echo'</select>
    </div>
  <button type="submit" name="idNav" value="'.$idNav.'">Ajouter</button>
  </form>';
  }
}
