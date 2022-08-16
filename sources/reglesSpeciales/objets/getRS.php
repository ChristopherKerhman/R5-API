<?php
Class getReglesSpecial  {
  protected $typeRS;
  protected $yes;
  public function __construct() {
    $this->typeRS = ['Armes', 'Figurines', 'Vehicules'];
    $this->yes = ['Non', 'Oui'];
  }
  public function getRSparType($type, $valide) {
    $param = [['prep'=>':typeRS', 'variable'=>$type],
              ['prep'=>':valideRS', 'variable'=>$valide]];
    $select = "SELECT `idRS`, `nomRS`
    FROM `reglesSpeciales`
    WHERE `typeRS` = :typeRS AND `valideRS` = :valideRS
    ORDER BY `nomRS`";
    $readRS = new RCUD($select, $param);
    return $readRS->READ();
  }
  public function getAffectationRS($idArme) {
    $select = "SELECT `idRS`, `nomRS`
    FROM `reglesSpeciales`
    WHERE `idRS`  NOT IN ( SELECT `id_RS`
                            FROM `ArmesRS`
       	                    WHERE `id_Arme` = :id_Arme)
                            AND `typeRS` = 0";
    $param =  [['prep'=>':id_Arme', 'variable'=>$idArme]];
    $readRS = new RCUD($select, $param);
    return  $readRS->READ();
  }
  public function getAffectationRS_Figurine($idFigurine) {
    $select = "SELECT `idRS`, `nomRS`
    FROM `reglesSpeciales`
    WHERE `idRS`  NOT IN ( SELECT `id_RS`
                            FROM `RS_Figurine`
       	                    WHERE `id_Figurine` = :id_Figurine)
                            AND `typeRS` = 1";
    $param =  [['prep'=>':id_Figurine', 'variable'=>$idFigurine]];
    $readRS = new RCUD($select, $param);
    return  $readRS->READ();
  }
  public function getOneRS ($id) {
    $param = [['prep'=>':idRS', 'variable'=>$id]];
    $select = "SELECT `idRS`, `nomRS`, `texteRS`, `prixRS`, `valideRS`, `typeRS` FROM `reglesSpeciales` WHERE `idRS` = :idRS";
    $readRS = new RCUD($select, $param);
    return $readRS->READ();
  }
}
