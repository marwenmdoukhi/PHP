<?php

///chargerClasse///
function chargerClasse($classe)
{
  require 'Classe/' . $classe . '.php';
}
spl_autoload_register('chargerClasse');
///////////////////

///BDD///
$bdd = new PDO('mysql:host=localhost;dbname=php-obj;charset=utf8', 'root', 'root');
/////////

$perso1 = new Personnage(60, 0); // 60 de force, 0 dégât
$perso2 = new Personnage(100, 10); // 100 de force, 10 dégâts

new Compteur;
new Compteur;
echo Compteur::getCompteur();
?>
