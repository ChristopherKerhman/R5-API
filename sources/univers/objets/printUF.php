<?php
Class PrintUF extends GetUF {
  public function array_NT() {
    return $this->NT;
  }
  public function optionUnivers($variable) {
    foreach ($variable as $key => $value) {
      echo '<option value="'.$value['idUnivers'].'">'.$value['nomUnivers'].' - NT '.$this->NT[$value['NT']].'</option>';
    }
  }
  public  function administrationFaction ($variable, $idNav) {
    echo '<ul class="listeStandard">';
      foreach ($variable as $key => $value) {
        echo '<li>';
        if($value['valide'] == 1){
          echo'<form class="formulaireClassique" action="'.encodeRoutage(25).'" method="post">
            <input type="hidden" name="idFaction" value="'.$value['idFaction'].'" />
            <button type="submit" name="idNav" value="'.$idNav.'">Effacer</button>
            </form>';
        } else {
          echo'<form class="formulaireClassique" action="'.encodeRoutage(26).'" method="post">
            <input type="hidden" name="idFaction" value="'.$value['idFaction'].'" />
            <button type="submit" name="idNav" value="'.$idNav.'">Rétablir</button>
            </form>';
        }
        echo $value['nomUnivers'].' - '.$value['nomFaction'].'</li>';
      }
     echo'</ul>';
  }
  public function selectFaction($variable) {
    foreach ($variable as $key => $value) {
      echo '<option value="'.$value['idFaction'].'">'.$value['nomUnivers'].' - '.$value['nomFaction'].'</option>';
    }
  }
}
