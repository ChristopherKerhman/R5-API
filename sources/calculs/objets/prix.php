<?php
Class Prix {
  private $puissance;
  private $surPuissance;
  private $type;
  private $gabarit;
  public function __construct($idArme){
    $this->idArme = $idArme;
    $this->puissance = [1, 2, 3, 4, 5, 6];
    $this->surPuissance = [0, 2];
    $this->type = [1, 2, 2];
    $this->gabarit = [13, 50, 113, 36];
  }
  public function coefArme(){
    // Caractéristique primaire de l'arme
    $select = "SELECT `idArme`, `range`, `puissance`, `surPuissance`, `typeArme`, `couverture`, `cadenceTir`, `gabarit`
    FROM `armes`
    WHERE `valide` = 1 AND `idArme` = :idArme";
    $param =  [['prep'=>':idArme', 'variable'=>$this->idArme]];
    $readArme = new RCUD($select, $param);
    $data = $readArme->READ();

    if($data[0]['range']>0) {
      $range = pi() * pow($data[0]['range'],2);
    } else {
      $range = pi();
    }
    $coef =  $range + $this->puissance[$data[0]['puissance']] +
    $data[0]['surPuissance'] + $this->type[$data[0]['typeArme']] +
    $data[0]['couverture'] + $data[0]['cadenceTir'] + $this->gabarit[$data[0]['gabarit']];
    //Influence règle spéciales
    $select = "SELECT SUM(`prixRS`) AS `total`
    FROM `ArmesRS`
    INNER JOIN `reglesSpeciales` ON `idRS` = `id_RS`
    WHERE `id_Arme` = :idArme";
    $param =  [['prep'=>':idArme', 'variable'=>$this->idArme]];
    $readRS = new RCUD($select, $param);
    $data = $readRS->READ();
    return  $coef + (100 * $data[0]['total']);
  }
}
