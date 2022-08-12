<?php
Class GetFigurines {
  protected $de;
  protected $armure;
  protected $pdv;
  protected $taille;
  protected $role;
  protected $yes;

  public function __construct() {
    $this->de = ['D6', 'D8', 'D10', 'D12'];
    $this->armure = ['Pas d\'armure', '6+', '5+', '4+', '3+', '2+'];
    $this->pdv = 6;
    $this->taille = ['Petite', 'Standard', 'Grande', 'Geante'];
    $this->role = ['Civile', 'Conscrit', 'Soldat professionnel', 'Elite', 'Officier', 'Officier Suppérieur'];
    $this->yes = ['Non', 'Oui'];
  }
}
