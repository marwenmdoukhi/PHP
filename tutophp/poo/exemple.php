<?php
require 'Personnage.php';
require 'archer.php';

require 'vendor/autoload.php';
$marlien=new Personnage('marlin');

$harry=new Personnage('harry');

$legolas=new Archer('leglos');

dump($harry,$marlien,$legolas);