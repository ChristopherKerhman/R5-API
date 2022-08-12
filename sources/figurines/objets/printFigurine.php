<?php
Class PrintFigurine extends GetFigurines {
  public function addFigurine() {
    $faction = new PrintUF();
    $dataFaction = $faction->listeFactions(1);
    echo '<h3>Ajouter une figurine</h3>';
    echo '<form class="formulaireClassique" action="'.encodeRoutage(30).'" method="post">
    <label for="faction">Faction de la figurine ?</label>
    <select id="faction" name="faction">';
      $faction->selectFaction($dataFaction);
    echo'</select>
    <label for="role">Type de rôle ?</label>
    <select id="role" name="role">';
      for ($i=0; $i <count($this->role) ; $i++) {
          if($i == 2) {
              echo '<option value="'.$i.'" selected>'.$this->role[$i].'</option>';
          } else {
          echo '<option value="'.$i.'">'.$this->role[$i].'</option>';
        }
      }
echo'</select>
<label for="nomFigurine">Nom de la figurine</label>
<input id="nomFigurine" type="text" name="nomFigurine" required/>
<label for="texteFigurine">Présentation de la figurine</label>
<textarea id="texteFigurine" name="texteFigurine" rows="8" cols="80" required></textarea>
<div class="formulaireInterne">
  <label for="DC">Dé de Combat (DC)</label>
        <select id="DC" name="DC">';
        for ($i=0; $i <count($this->de) ; $i++) {
          if($i == 1) {
              echo  '<option value="'.$i.'" selected>'.$this->de[$i].'</option>';
          } else {
          echo  '<option value="'.$i.'">'.$this->de[$i].'</option>';
          }
        }
        echo'</select>
        <label for="DQM">Dé de Qualité Martial (DQM)</label>
              <select id="DQM" name="DQM">';
              for ($i=0; $i <count($this->de) ; $i++) {
                if($i == 1) {
                    echo  '<option value="'.$i.'" selected>'.$this->de[$i].'</option>';
                } else {
                echo  '<option value="'.$i.'">'.$this->de[$i].'</option>';
                }
              }
              echo'</select>
  </div>
  <div class="formulaireInterne">
  <label for="taille">Taille de la figurine ?</label>
  <select id="taille" name="taille">';
  for ($i=0; $i <count($this->taille) ; $i++) {
      if($i == 1) {
          echo  '<option value="'.$i.'" selected>'.$this->taille[$i].'</option>';
      } else {
        echo  '<option value="'.$i.'">'.$this->taille[$i].'</option>';
    }
  }
  echo'</select>
  <label for="svg">Sauvegarde de la figurine ?</label>
  <select id="svg" name="svg">';
  for ($i=0; $i <count($this->armure) ; $i++) {
      if($i == 2) {
          echo  '<option value="'.$i.'" selected>'.$this->armure[$i].'</option>';
      } else {
        echo  '<option value="'.$i.'">'.$this->armure[$i].'</option>';
    }
  }
  echo'</select>
  <label for="pdv">Nombre de point de vie ?</label>
  <input id="pdv" name="pdv" type="number" min="0" max="12" step="1" value="2" required />
  <label for="mouvement">Mouvement en pouce ?</label>
  <input id="mouvement" name="mouvement" type="number" min="0" max="12" step="1" value="4" required />
  </div>
    <div class="formulaireInterne">
      <label for="vol">La figurine vol ?</label>
      <select id="vol" name="vol">';
      for ($i=0; $i <count($this->yes) ; $i++) {
        echo '<option value="'.$i.'">'.$this->yes[$i].'</option>';
      }
      echo'</select>
      <label for="volStation">La figurine peut faire du vol stationnaire ?</label>
      <select id="volStation" name="volStation">';
      for ($i=0; $i <count($this->yes) ; $i++) {
        echo '<option value="'.$i.'">'.$this->yes[$i].'</option>';
      }
      echo'</select>
  </div>

<button type="submit" name="idNav" value="'.$idNav.'">Ajouter</button>
</form>';
  }
}
