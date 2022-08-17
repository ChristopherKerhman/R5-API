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
  public function   modFigurine($data, $idNav) {
    $faction = new PrintUF();
    $dataFaction = $faction->listeFactions(1);
    echo '<h3>Modifier une figurine</h3>';
    echo '<form class="formulaireClassique" action="'.encodeRoutage(33).'" method="post">
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
  <input id="nomFigurine" type="text" name="nomFigurine" value="'.$data[0]['nomFigurine'].'" required/>
  <label for="texteFigurine">Présentation de la figurine</label>
    <textarea id="texteFigurine" name="texteFigurine" rows="8" cols="80" required>'.$data[0]['texteFigurine'].'</textarea>
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
  <input id="pdv" name="pdv" type="number" min="0" max="12" step="1" value="'.$data[0]['pdv'].'" required />
  <label for="mouvement">Mouvement en pouce ?</label>
  <input id="mouvement" name="mouvement" type="number" min="0" max="12" step="1" value="'.$data[0]['mouvement'].'" required />
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
  <input type="hidden" name="idFigurine" value="'.$data[0]['idFigurine'].'" />
<button type="submit" name="idNav" value="'.$idNav.'">Modifier '.$data[0]['nomFigurine'].'</button>
</form>';
  }
  public function cloneFigurine($idFigurine, $idNav) {
      echo '<form class="formulaireClassique" action="'.encodeRoutage(34).'" method="post">
      <input type="hidden" name="idFigurine" value="'.$idFigurine.'" />
      <button type="submit" name="idNav" value="'.$idNav.'">Cloner</button>
      </form>';
  }

  public function tableauFigurine($variable, $currentPage) {
    echo '<h3>Les figurines créées - Page : '.$currentPage.'</h3>';
    echo '<ul class="listeStandard">';
      foreach ($variable as $key => $value) {
        $prix = new PrixFigurine($value['idFigurine']);
        $prixF = $prix->coefFigurine ();
        echo '<li>
        <p class="PrixBox">'.round($prixF, 0).'</p>
        <a class="navigationListe" href="'.findTargetRoute(111).'&idFigurine='.$value['idFigurine'].'">Voir fiche</a>
        <a class="navigationListe" href="'.findTargetRoute(114).'&idFigurine='.$value['idFigurine'].'">Ajouter RS</a>
        <a class="navigationListe" href="'.findTargetRoute(113).'&idFigurine='.$value['idFigurine'].'">Ajouter Armes</a>
        <a class="navigationListe" href="'.findTargetRoute(112).'&idFigurine='.$value['idFigurine'].'">Modifier</a>
        '.$value['nomUnivers'].' - '.$value['nomFaction'].' | '.$value['nomFigurine'].'
        | Role : '.$this->role[$value['role']].' | DC/DQM : '.$this->de[$value['DC']].'/'.$this->de[$value['DQM']].' | Déplacement tactique '.$value['mouvement'].'"/ Course '.round($value['mouvement']*1.4, 0).'"</li>';
  }
    echo '</ul>';
  }
  public function figurineComplet ($figurine, $armes, $RS, $prix) {
    //Affichage Statistique Figurine
    if(($figurine[0]['vol']>0)||($figurine[0]['volStation']>0)) {
      $vol = '<li>Figurine volante : '.$this->yes[$figurine[0]['vol']].'</li><li>Capacité de vol stationnaire : '.$this->yes[$figurine[0]['volStation']].'</li>';
    } else {
      $vol = '';
    }
    echo '<h3>'.$figurine[0]['nomFigurine'].' | '.$figurine[0]['nomUnivers'].' - '.$figurine[0]['nomFaction'].' Prix : '.round($prix, 0).' points</h3>';
    echo '<ul class="listeProfil">';
      echo '<li>Mouvement '.$figurine[0]['mouvement'].' " / '.round($figurine[0]['mouvement'] * 1.4, 0).' + 1D4"</li>';
      echo '<li>DQM : '.$this->de[$figurine[0]['DQM']].' | DC : '.$this->de[$figurine[0]['DC']].'</li>';
      echo '<li>Role : '.$this->role[$figurine[0]['role']].'</li>';
      echo '<li>Taille figurine : '.$this->taille[$figurine[0]['taille']].'</li>';
      echo '<li>Armure : '.$this->armure[$figurine[0]['svg']].'</li>';
      echo '<li>Point de vie : '.$figurine[0]['pdv'].'</li>';
      echo $vol;
        if($RS == []) {
            echo '<li><strong class="liste">Pas encore de règles spéciales.</strong></li>';
        } else {
          echo '<li>Règles spéciales : ';
          foreach ($RS as $cle => $valeur) {
            echo $valeur['nomRS'].'.';
          }
          echo '</li>';

        }
          if($armes == []) {
            echo '<li><strong class="liste">Pas encore d\'armement.</strong></li>';
          } else {
            $dotation = new PrintArmes();
            $dotation->listeDotation($armes, $this->de[$figurine[0]['DC']]);
          }
        echo'</ul>';
  }
}
