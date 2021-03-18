<?php
class personnage
{
  public $vie = 80;
  public $atk = 20;
  public $nom;

  public function __construct($nom)
  {
    $this->nom = $nom;
  }

  public function crier()
  {
    echo 'LEEEROY JENKINS';
  }

  public function regenerer($pt_vie = null)
  {
    if (is_null($pt_vie))
    {
      $this->vie = 100;
    }
    else
    {
      $this->vie += $pt_vie;
    }
  }

  public function mort()
  {
    if ($this->vie <= 0)
    {
      echo $this->nom . ' est mort !';
      return true;

    }
  }

  public function attaque($cible)
  {
    echo 'Attaquant : ' . $this->nom . '<br>';
    echo 'Cible : ' . $cible->nom . '<br>';
    $cible->vie -= $this->atk;
    echo $cible->nom . ' à perdu <strong>' . $this->atk . '</strong> points de vie.<br>';
    echo 'Il reste ' . $cible->vie . ' points de vie à ' . $cible->nom . '<br><br><br>';
    if ($cible->mort() === true)
    {
      return true;
    }
    else
    {
      return false;
    }
  }
}
