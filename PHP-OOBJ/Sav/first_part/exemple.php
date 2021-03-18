<?php
namespace Tutoriel;
use \Tutoriel\Autoloader;

require 'class/Autoloader.php';
Autoloader::register();

$merlin = new Personnage('Merlin');
$harry = new Personnage('Harry');

$legolas = new Archer('Legolas');

var_dump($merlin, $harry, $legolas);
