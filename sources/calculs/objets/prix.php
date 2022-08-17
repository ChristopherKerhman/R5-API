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
    $this->gabarit = [0, 12, 50, 113, 75];
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
    $data[0]['couverture'] + $data[0]['cadenceTir'] + ($this->gabarit[$data[0]['gabarit']]*10);
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
Class PrixFigurine {
  private $role;
  private $taille;
  private $DC;
  private $DQM;
  private $svg;
  public function __construct($idFigurine) {
    $this->paramID = [['prep'=>':id', 'variable'=>$idFigurine]];
    $this->role = [2, 4, 6, 10, 8, 12];
    $this->taille = [2, 1, 3, 6];
    $this->DC = [6, 8, 10, 12];
    $this->DQM = [3, 5, 8, 10];
    $this->svg = [1, 1.2, 1.3, 1.5, 1.8, 2.2];
  }
  public function coefFigurine () {
    // Récupération des données de la figurine
    $select = "SELECT `role`, `taille`, `DC`, `DQM`, `mouvement`, `svg`, `pdv`, `vol`, `volStation`
    FROM `figurines`
    WHERE `idFigurine` = :id";
      $readFigurine = new RCUD($select, $this->paramID);
      $data = $readFigurine->READ();
    // Récupération des RS de la figurine
    $somme = "SELECT SUM(`prixRS`) AS `total`
    FROM `RS_Figurine`
    INNER JOIN `reglesSpeciales` ON `id_RS` = `idRS`
    WHERE `id_Figurine` = :id";
        $somme = new RCUD($somme, $this->paramID);
        $totalRS = $somme->READ();
        $totalRS = $totalRS[0]['total'];
    // Récupération des armes de la figurine
    $selectArmes = "SELECT `id_Arme`FROM `Armes_Figurine` WHERE `id_Figurine` = :id";
    $readIdArmes = new RCUD($selectArmes, $this->paramID);
    $idDesArmes = $readIdArmes->READ();
    $sommeArmes = 0;
    foreach ($idDesArmes as $key => $value) {
      $calculArmes = new Prix($value['id_Arme']);
      $sommeArmes = $sommeArmes + $calculArmes->coefArme();
    }
    //Calcul du total de la figurine
    //Extraction et calcul divers
    $mouvement = ($data[0]['mouvement'] + 1)*1.5;
    if($data[0]['vol']) {
      $mouvement = $mouvement *1.2;
    }
    if($data[0]['volStation']) {
      $mouvement = $mouvement *1.1;
    }
    $DC = $this->DC[$data[0]['DC']];
    $DQM = $this->DQM[$data[0]['DQM']];
    $role = $this->role[$data[0]['role']];
    $taille = $this->taille[$data[0]['taille']];
    $svg = $this->svg[$data[0]['svg']];
    $pdv = $data[0]['pdv'];
    return $mouvement + $DC + $DQM + $role + $taille + $svg + $pdv + $sommeArmes;
  }
}
