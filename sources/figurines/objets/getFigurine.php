<?php
Class GetFigurines {
  protected $de;
  protected $armure;
  protected $taille;
  protected $role;
  protected $yes;

  public function __construct() {
    $this->de = ['D6', 'D8', 'D10', 'D12'];
    $this->armure = ['Pas d\'armure', '6+', '5+', '4+', '3+', '2+'];
    $this->taille = ['Petite', 'Standard', 'Grande', 'Geante'];
    $this->role = ['Civile', 'Conscrit', 'Soldat professionnel', 'Elite', 'Officier', 'Officier Suppérieur'];
    $this->yes = ['Non', 'Oui'];
  }
  public function getAllFigurines($valide, $premier, $parPage) {
    $select = "SELECT `idFigurine`, `faction`, `role`, `taille`, `DC`, `DQM`, `mouvement`, `svg`, `pdv`, `vol`, `volStation`, `nomFigurine`, `nomFaction`, `nomUnivers`
FROM `figurines`
INNER JOIN `factions` ON `faction` = `idFaction`
INNER JOIN `univers` ON `idUnivers` = `id_Univers`
WHERE `figurineValide` = :valide
ORDER BY `nomUnivers`, `nomFaction`, `nomFigurine`
    LIMIT {$premier}, {$parPage}";
    $param = [['prep'=>':valide', 'variable'=>$valide]];
    $readData = new RCUD($select, $param);
    return $readData->READ();
  }
  public function getFigurines($valide, $premier, $parPage, $tri) {
    $select = "SELECT `idFigurine`, `faction`, `role`, `taille`, `DC`, `DQM`, `mouvement`, `svg`, `pdv`, `vol`, `volStation`, `nomFigurine`, `nomFaction`, `nomUnivers`
FROM `figurines`
INNER JOIN `factions` ON `faction` = `idFaction`
INNER JOIN `univers` ON `idUnivers` = `id_Univers`
WHERE `figurineValide` = :valide AND `faction` = :faction
ORDER BY `nomUnivers`, `nomFaction`, `nomFigurine`
    LIMIT {$premier}, {$parPage}";
    $param = [['prep'=>':valide', 'variable'=>$valide], ['prep'=>':faction', 'variable'=>$tri]];
    $readData = new RCUD($select, $param);
    return $readData->READ();
  }
  public function getOneFigurine($idFigurine, $valide) {
    $select = "SELECT `idFigurine`, `faction`, `role`, `taille`, `DC`, `DQM`, `mouvement`, `svg`, `pdv`, `vol`, `volStation`, `figurineValide`, `nomFigurine`, `texteFigurine`, `nomFaction`, `nomUnivers`
      FROM `figurines`
      INNER JOIN `factions` ON `faction` = `idFaction`
      INNER JOIN `univers` ON `idUnivers` = `id_Univers`
      WHERE `figurineValide` = :figurineValide AND `idFigurine` = :idFigurine";
    $param = [['prep'=>':idFigurine', 'variable'=>$idFigurine], ['prep'=>':figurineValide', 'variable'=>$valide]];
    $data = new RCUD($select, $param);
    return $data->READ();
  }
  public function getParamOneFigurine($idFigurine, $type) {
    //$type = 0 Règles spéciale, $type = 1 Armes
    $select = ["SELECT `nomRS`, `texteRS`, `prixRS`, `typeRS`, `idRS`
    FROM `RS_Figurine`
    INNER JOIN `reglesSpeciales` ON `idRS` = `id_RS`
    WHERE `id_Figurine` = :idFigurine",
    "SELECT `id_Arme`, `nomArme`, `description`, `range`,
    `puissance`, `surPuissance`, `typeArme`, `couverture`,
    `cadenceTir`, `gabarit`
    FROM `Armes_Figurine`
    INNER JOIN `armes` ON `id_Arme` = `idArme`
    WHERE `id_Figurine` = :idFigurine"];
    $param = [['prep'=>':idFigurine', 'variable'=>$idFigurine]];
    $data = new RCUD($select[$type], $param);
    return $data->READ();
  }

}
