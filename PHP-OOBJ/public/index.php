<?php
require '../app/Autoloader.php';
App\Autoloader::register();

$config=new App\Config();

$psot=App\App::getTable('posts');

var_dump($psot);