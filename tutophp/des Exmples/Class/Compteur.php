<?php
class Compteur{

    public $ficher;

    public function __construct(string $ficher)
    {
        $this->ficher=$ficher;
    }

    public function incremente():void
    {
        $compteur = 1;
        if(file_exists($this->ficher)){
            $compteur=(int)file_get_contents($this->ficher);
            $compteur++;
        }
        file_put_contents($this->ficher,$compteur);
    }

    public function recepuerer():int
    {
        if (!file_exists($this->ficher)){
            return 0;
        }
       return file_put_contents($this->ficher);


    }

}