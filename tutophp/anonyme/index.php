<?php

require 'vendor/autoload.php';
class demo{

    private $eleves=[

        [
            'nom'=>'ali',
            'age'=>18,
            'moyenne'=>17,
        ],

        [
            'nom'=>'boubou',
            'age'=>25,
            'moyenne'=>12,


        ],
        [
            'nom'=>'sami',
            'age'=>30,
            'moyenne'=>10,

        ],

        [
            'nom'=>'marry',
            'age'=>30,
            'moyenne'=>8,

        ],
    ];

    public function filtierfunction($eleve){
        return $eleve['moyenne'] <10;
    }
    public function boneleve(){


        return array_filter($this->eleves,[$this,'filtierfunction']);
    }



}

$demo=new Demo();

$demo->boneleve();

dump($demo);