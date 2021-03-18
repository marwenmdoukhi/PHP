<?php


class Creneau
{

    public $debut;
    public $fin;

    public function __construct(int $debut , int $fin)
    {
        $this->debut =$debut;
        $this->fin=$fin;
    }

    public function Tohtml(){

        return "<strong>{$this->debut}</strong> a<strong>{$this->fin} </strong> ";
    }

    public function incluhere(int $here):bool
    {
        return $here >= $this->debut && $here<=$this->fin;
    }

    public  function intersset(Creneau $creneau):bool
    {

        return
            $this->incluhere($creneau-$this->debut)
            ||
            $this->incluhere($creneau-$this->fin)
            ||
            ($this->debut < $creneau->debut && $this->fin > $creneau-$this->fin);
    }

}