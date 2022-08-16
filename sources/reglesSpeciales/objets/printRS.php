<?php
Class printReglesSpecial extends  getReglesSpecial {
  public function formADDRS ($idNav, $idRoute) {
    echo '<h3>Ajouter un nouvelle régle spéciales</h3>
    <form class="formulaireClassique" action="'.encodeRoutage($idRoute).'" method="post">
      <label for="nomRS">Nom de la règle spéciale</label>
      <input id="nomRS" type="text" name="nomRS" required>
      <label for="texteRS">Description de la règle spéciale</label>
      <textarea id="texteRS" name="texteRS" rows="8" cols="80" required></textarea>
      <label for="typeRS">Type de règle spécial</label>
      <select id="typeRS" name="typeRS">';
      for ($i=0; $i < count($this->typeRS) ; $i++) {
        echo '<option value="'.$i.'">'.$this->typeRS[$i].'</option>';
       }
  echo'</select>
        <label for="prixRS">Coefficient règles spéciale ?</label>
      <input id="prixRS" type="number" name="prixRS" min="0" max="1" step="0.1" required>
      <button type="submit" name="idNav" value="'.$idNav.'">Ajouter nouvelle règles spéciales</button>
    </form>';
  }
  public function affichageNomRS($variable) {
    echo '<lu class="listeObjet">';
      foreach ($variable as $key => $value) {
        echo '<li><a class="lienInterne" href="'.findTargetRoute(94).'&idRS='.$value['idRS'].'">Voir '.$value['nomRS'].'</a><a class="lienInterne" href="'.findTargetRoute(95).'&idRS='.$value['idRS'].'">Modifier '.$value['nomRS'].'</a></li>';
      }
    echo '</lu>';
  }
  public function printOneRS ($data) {
    echo '<ul class="listeProfil">
            <li><h4>Nom : '.$data[0]['nomRS'].' - Type : '.$this->typeRS[$data[0]['typeRS']].'</h4></li>
            <li><strong>Description :</strong><br /> <p class="articleRS">'.$data[0]['texteRS'].'</p></li>
            <li><strong>Coefficient :</strong> '.$data[0]['prixRS'].'</li>
          </ul>';
  }
  public function formUpdateRS ($idNav, $idRoute, $data, $id) {
    echo '<form class="formulaireClassique" action="'.encodeRoutage($idRoute).'" method="post">
      <label for="nomRS">Nom de la règle spéciale</label>
      <input id="nomRS" type="text" name="nomRS" value="'.$data[0]['nomRS'].'" required>
      <label for="texteRS">Description de la règle spéciale</label>
      <textarea id="texteRS" name="texteRS" rows="8" cols="80" required>'.$data[0]['texteRS'].'</textarea>
      <label for="typeRS">Type de règle spécial</label>
      <select id="typeRS" name="typeRS">';
      for ($i=0; $i < count($this->typeRS) ; $i++) {
        if($i == $data[0]['typeRS']){
            echo '<option value="'.$i.'" selected>'.$this->typeRS[$i].'</option>';
        } else {
            echo '<option value="'.$i.'">'.$this->typeRS[$i].'</option>';
        }

       }
  echo'</select>
      <label for="prixRS">Coefficient règles spéciale ?</label>
      <input id="prixRS" type="number" name="prixRS" min="0" max="1" step="0.1" value="'.$data[0]['prixRS'].'" required>
      <label for="valideRS">Règle spéciales valide ?</label>
      <select id="valideRS" name="valideRS">';
      for ($i=0; $i <count($this->yes) ; $i++) {
        if($i == $data[0]['valideRS']){
          echo '<option value="'.$i.'" selected>'.$this->yes[$i].'</option>';
        } else {
              echo '<option value="'.$i.'">'.$this->yes[$i].'</option>';
        }
      }
  echo'</select>
      <input type="hidden" name="idRS" value="'.$id.'" />
      <button type="submit" name="idNav" value="'.$idNav.'">Modifier la règles spéciales '.$data[0]['nomRS'].'</button>
    </form>';
  }
  public function affecterRS($variable, $idNav, $idArme, $bascule) {
    // Traitement de variable
    echo '<aside class="nuageRS">';
    foreach ($variable as $key => $value) {
        echo '<form action="'.encodeRoutage(27).'" method="post">
                <input type="hidden" name="addRS" value="'.$bascule.'" />
                <input type="hidden" name="id_RS" value="'.$value['idRS'].'">
                <input type="hidden" name="id_Arme" value="'.$idArme.'">
                <button type="submit" name="idNav" value="'.$idNav.'">'.$value['nomRS'].'</button>
                </form>';
      }
    echo '</aside>';
  }
  public function affecterRSFigurine($variable, $idNav, $idFigurine, $affecter) {
    // Traitement de variable
    echo '<aside class="nuageRS">';
    foreach ($variable as $key => $value) {
        echo '<form action="'.encodeRoutage(31).'" method="post">
                <input type="hidden" name="addRS" value="'.$affecter.'" />
                <input type="hidden" name="id_RS" value="'.$value['idRS'].'">
                <input type="hidden" name="id_Figurine" value="'.$idFigurine.'">
                <button type="submit" name="idNav" value="'.$idNav.'">'.$value['nomRS'].'</button>
                </form>';
      }
    echo '</aside>';
  }
}
