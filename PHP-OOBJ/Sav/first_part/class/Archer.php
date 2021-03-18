<?php
namespace Tutoriel;
class Archer extends Personnage
{
  public $vie = 40;

  public function __construct($nom)
  {
    parent::__construct($nom);
  }

  public function attaque($cible)
  {
    $cible->vie -= 2 * $this->atk;
    parent::attaque($cible);
  }
}
