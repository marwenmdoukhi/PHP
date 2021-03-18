<?php


class Personnage
{

    const  MAX_VIE =100;
    private $vie=80;

    /**
     * @return int
     */
    public function getVie()
    {
        return $this->vie;
    }

    /**
     * @param int $vie
     * @return Personnage
     */
    public function setVie($vie)
    {
        $this->vie = $vie;
        return $this;
    }

    /**
     * @return int
     */
    public function getAtk()
    {
        return $this->atk;
    }

    /**
     * @param int $atk
     * @return Personnage
     */
    public function setAtk($atk)
    {
        $this->atk = $atk;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param mixed $nom
     * @return Personnage
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
        return $this;
    }
    private  $atk=80;
    private  $nom;

    public function __construct($nom)
    {
        return $this->nom=$nom;

    }


    public function attaque($cible)
    {

        $cible->vie=20;

    }

    public function regenerer($vie=null)
    {
        if (is_null($vie)){
            $this->vie=100;
        }else{

            $this->vie +=$vie;
        }

    }

    public function mort()
    {

        return $this->vie<=0;
    }


}