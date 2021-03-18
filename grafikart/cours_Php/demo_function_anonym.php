<?php
require 'vendor/autoload.php';

class Demo
{
    private $eleves = [
        [
            'nom' => 'Leo',
            'age' => 24,
            'moyenne' => 15
        ],
        [
            'nom' => 'Jean',
            'age' => 18,
            'moyenne' => 12
        ],
        [
            'nom' => 'Mark',
            'age' => 30,
            'moyenne' => 9
        ],
        [
            'nom' => 'Marie',
            'age' => 26,
            'moyenne' => 19
        ],
        [
            'nom' => 'Odile',
            'age' => 22,
            'moyenne' => 8
        ],
    ];

    public function filterFonction($eleve)
    {
            return $eleve['moyenne'] > 10;
    }



    public function bonEleves()
    {
       return array_filter($this->eleves, [$this, 'filterFonction']);
    }
}

$demo = new Demo();
dump($demo->bonEleves());





/*
* function avec use pour utiliser une variable definie en dehors de la fonction
*/

/*
*utiliser une fonction qui retourne une closure(fonction anonyme)
*/
/*
function sortByKey(array $array, string $key)
{
    usort($array, function($a, $b) use ($key) {
      return $a[$key] - $b[$key];
    });
    return $array;
}


$elevesAvecMoyenne = array_filter($eleves, function($eleve) {
    return $eleve['moyenne'] > 10;
});

$elevesSansMoyenne = array_filter($eleves, function ($eleve) {
    return $eleve['moyenne'] < 10;
});
*/



//usort($elesves, $sort);

//usort($elesves, sortByKey('age'));

//$elevesSorted = sortByKey($eleves, 'age');
//dump($eleves);
//dump($elevesAvecMoyenne);
//dump($elevesSansMoyenne);
