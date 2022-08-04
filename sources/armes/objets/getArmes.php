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
}
