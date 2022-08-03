<?php
Class GetArmes {
  protected $typeArmes;
  protected $yes;
  protected $gabarits;
  public function __construct() {
    $this->$typeArmes = ['Close', 'Tir', 'Explosif'];
    $this->yes = ['Non', 'Oui'];
    $this->gabarits = ['Petit', 'Moyen', 'Grand', 'Cône'];
  }
}
