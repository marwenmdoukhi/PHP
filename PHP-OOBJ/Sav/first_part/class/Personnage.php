<?php
namespace Tutoriel;
class personnage
{
  const MAX_VIE = 100;
  protected $vie = 80;
  protected $atk = 20;
  protected $nom;

  public function __construct($nom)
  {
    $this->nom = $nom;
  }

  public function getNom()
  {
    return $this->nom;
  }

  public function getVie()
  {
    return $this->vie;
  }

  public function getAtk()
  {
    return $this->atk;
  }

  public function crier()
  {
    echo 'LEEEROY JENKINS';
  }

  public function setNom($nom)
  {
    $this->nom = $nom;
  }

  public function setAtk($atk)
  {
    $this->atk = $atk;
  }

  public function setVie($vie)
  {
    $this->vie = $vie;
  }

  public function regenerer($pt_vie = null)
  {
    if (is_null($pt_vie))
    {
      $this->vie = self::MAX_VIE;
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
