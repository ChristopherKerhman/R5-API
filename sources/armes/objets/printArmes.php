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
    <label for="surPuissance">Sur-Puissance (++)</label>
    <select id="surPuissance" name="surPuissance">';
    for ($i=0; $i <count($this->yes) ; $i++) {
      echo  '<option value="'.$i.'">'.$this->yes[$i].'</option>';
    }
    echo'</select>
    </div>
    <div class="formulaireInterne">
    <label for="couverture">Arme de couverture ?</label>
    <select id="couverture" name="couverture">';
    for ($i=0; $i <count($this->yes) ; $i++) {
      echo  '<option value="'.$i.'">'.$this->yes[$i].'</option>';
    }
    echo'</select>
    <label for="cadenceTir">Cadence de tir de l\'arme ?</label>
    <input id="cadenceTir" name="cadenceTir" type="number" min="0" max="11" step="1" placeholder="0" required />
    </div>
      <div class="formulaireInterne">
        <label for="range">Portée de l\'arme (en pouces)</label>
        <input id="range" name="range" type="number" min="0" max="80" step="1" value="0" required />
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
  public function Ratellier($variable, $currentPage) {
    echo '<h3>Les armes créées - Page : '.$currentPage.'</h3>';
    echo '<ul class="listeStandard">';
      foreach ($variable as $key => $value) {
        if($value['surPuissance']>0) {$PP = '++';} else {$PP = NULL;}
        echo '<li><a class="navigationListe" href="'.findTargetRoute(105).'&idArme='.$value['idArme'].'">Voir fiche</a><a class="navigationListe" href="'.findTargetRoute(106).'&idArme='.$value['idArme'].'">Ajouter RS</a>';
        echo $value['nomUnivers'].' Faction : '.$value['nomFaction'].'<br />';
        if(($value['range'] >= 0)&&($value['gabarit'] > 0)) {
          if($value['range'] == 0) { $range = 'Contact';} else {$range = $value['range'].' "';}
          echo 'Nom : '.$value['nomArme'].' - Type: '.$this->typeArmes[$value['typeArme']].' - '.$this->puissance[$value['puissance']].$PP.' Portée : '.$range.' - Gabarit '.$this->gabarit[$value['gabarit']];
        } elseif (($value['range'] > 0)&&($value['gabarit'] == 0)) {
          echo 'Nom : '.$value['nomArme'].' - Type: '.$this->typeArmes[$value['typeArme']].' - '.$this->puissance[$value['puissance']].$PP.' - Portée : '.$value['range'].' " / '.round($value['range']*2.54, 0).' cm  ';
        } elseif (($value['range'] == 0)&&($value['gabarit'] == 0)) {
          echo 'Nom : '.$value['nomArme'].' - Type: '.$this->typeArmes[$value['typeArme']].' - '.$this->puissance[$value['puissance']].$PP.' - Contact  ';
        }
          echo '<br />Couverture : '.$this->yes[$value['couverture']]; if($value['couverture']) {echo ' | Cadence de tir: '. $value['cadenceTir'];}
        echo '</li>';
  }
    echo '</ul>';
  }
  public function afficherUneArme($data, $dataRS, $coef) {
    echo '<ul class="listeStandard">';
      echo '<li><h3>'.$data[0]['nomUnivers'].' Faction : '.$data[0]['nomFaction'].' Prix : '.(round($coef,0)/100).'</h3></li>';
    if(($data[0]['range'] > 0)&&($data[0]['gabarit'] > 0)) {
        echo '<li><h4>Nom : '.$data[0]['nomArme'].'</h4></li><li>Type: '.$this->typeArmes[$data[0]['typeArme']].'</li><li>Puissance : '.$this->puissance[$data[0]['puissance']].'</li><li> Portée : '.$data[0]['range'].' "/
         '.round($data[0]['range']*2.54, 0).' cm "</li><li>Gabarit '.$this->gabarit[$data[0]['gabarit']].'</li>';
    } elseif (($data[0]['range'] == 0)&&($data[0]['gabarit'] > 0)) {
        echo '<li><h3>Nom : '.$data[0]['nomArme'].'</h3></li><li>Type: '.$this->typeArmes[$data[0]['typeArme']].'</li><li>Puissance : '.$this->puissance[$data[0]['puissance']].'</li><li>Gabarit '.$this->gabarit[$data[0]['gabarit']].'</li>  ';
    } elseif (($data[0]['range'] > 0)&&($data[0]['gabarit'] == 0)) {
      echo '<li><h3>Nom : '.$data[0]['nomArme'].'</h3></li><li>Type: '.$this->typeArmes[$data[0]['typeArme']].'</li><li>Puissance : '.$this->puissance[$data[0]['puissance']].'</li><li>Portée : '.$data[0]['range'].' "/
       '.round($data[0]['range']*2.54, 0).' cm</li>';
    } elseif (($data[0]['range'] == 0)&&($data[0]['gabarit'] == 0)) {
      echo '<li><h3>Nom : '.$data[0]['nomArme'].'</h3></li><li>Type: '.$this->typeArmes[$data[0]['typeArme']].'</li><li>Puissance : '.$this->puissance[$data[0]['puissance']].'</li>';
    }
      echo '<br />Couverture : '.$this->yes[$data[0]['couverture']]; if($data[0]['couverture']) {echo ' | Cadence de tir: '. $data[0]['cadenceTir'];}
    echo '<li><h4>Description de l\'arme : </h4></li><li>'.$data[0]['description'].'</li>';
    echo '<li>Règles spéciales : ';
    foreach ($dataRS as $cle => $valeur) {
      echo $valeur['nomRS'].'.';
    }
    echo '</li>';
    echo '</ul>';
  }
}
