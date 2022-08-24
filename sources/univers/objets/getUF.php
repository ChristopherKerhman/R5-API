<?php
Class GetUF {
  protected $NT;
  public function __construct(){
    $this->NT = ['Primitif', 'Antique', 'Moyenne âge', 'Renaissance', 'Contemporrain', 'Moderne', 'Science fiction'];
  }
  public function lectureUnivers($valide) {
    $param = [['prep'=>':valide', 'variable'=>$valide]];
    $select = "SELECT `idUnivers`, `nomUnivers`, `NT`, `valide` FROM `univers` WHERE `valide` = :valide";
    $readData = new RCUD($select, $param);
    return $readData->READ();
  }
  public function listeFactions($valide) {
    $select = "SELECT `idUnivers`, `nomUnivers`, `NT`, `nomFaction`, `idFaction`, `factions`.`valide`
    FROM `univers`
    INNER JOIN `factions` ON `id_Univers` = `idUnivers`
    WHERE `univers`.`valide` = 1 AND `factions`.`valide` = :valide
    ORDER BY `nomUnivers`, `nomFaction`";
        $param = [['prep'=>':valide', 'variable'=>$valide]];
        $readData = new RCUD($select, $param);
        return $readData->READ();
  }
  public function oneFaction ($idFaction) {
    $select = "SELECT `nomFaction` FROM `factions` WHERE `idFaction` = :idFaction";
    $param = [['prep'=>':idFaction', 'variable'=> $idFaction]];
    $read = new RCUD($select, $param);
    return $read->READ();
  }
}
