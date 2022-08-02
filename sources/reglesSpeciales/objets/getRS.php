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
  public function getOneRS ($id) {
    $param = [['prep'=>':idRS', 'variable'=>$id]];
    $select = "SELECT `idRS`, `nomRS`, `texteRS`, `prixRS`, `valideRS`, `typeRS` FROM `reglesSpeciales` WHERE `idRS` = :idRS";
    $readRS = new RCUD($select, $param);
    return $readRS->READ();
  }
}
