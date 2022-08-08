<?php
Class GetArmes {
  protected $typeArmes;
  protected $yes;
  protected $gabarit;
  protected $puissance;
  public function __construct() {
    $this->typeArmes = ['Close', 'Tir', 'Explosif'];
    $this->yes = ['Non', 'Oui'];
    $this->gabarit = ['Pas de gabarit', 'Petit', 'Moyen', 'Grand', 'Cône'];
    $this->puissance = ['1D', '2D', '3D', '4D', '5D', '6D'];
  }
  public function getArmes($valide, $premier, $parPage) {
    $select = "SELECT `idArme`, `id_Faction`, `nomArme`, `description`, `range`, `puissance`, `surPuissance`, `typeArme`, `gabarit`, `nomFaction`, `nomUnivers`
    FROM `armes`
    INNER JOIN `factions` ON `id_Faction` = `idFaction`
    INNER JOIN `univers` ON `id_Univers` = `idUnivers`
    WHERE `armes`.`valide` = :valide
    LIMIT {$premier}, {$parPage}";
    $param = [['prep'=>':valide', 'variable'=>$valide]];
    $readData = new RCUD($select, $param);
    return $readData->READ();
  }
  public function uneArme($valide, $id) {
    $select = "SELECT `idArme`, `id_Faction`, `nomArme`, `description`, `range`, `puissance`, `surPuissance`, `typeArme`, `gabarit`, `nomFaction`, `nomUnivers`
    FROM `armes`
    INNER JOIN `factions` ON `id_Faction` = `idFaction`
    INNER JOIN `univers` ON `id_Univers` = `idUnivers`
    WHERE `armes`.`valide` = :valide AND `idArme` = :idArme";
    $param = [['prep'=>':valide', 'variable'=>$valide], ['prep'=>':idArme', 'variable'=>$id]];
    $readData = new RCUD($select, $param);
    return $readData->READ();
  }
}
