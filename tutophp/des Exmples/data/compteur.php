<?php

 function ajouter_vue():void{
     $fichier =dirname(__DIR__). DIRECTORY_SEPARATOR. 'data'.DIRECTORY_SEPARATOR.'compteur';
     $fichierjouranillier=$fichier.'_'.date('Y-m-d');
     incriment($fichier);
     incriment($fichierjouranillier);
 }

 function incriment(string  $fichier):void{
     $compteur = 1;
     if(file_exists($fichier)){
         $compteur=(int)file_get_contents($fichier);
         $compteur++;
     }
     file_put_contents($fichier,$compteur);

 }


function nbvisite(){
    $fichier =dirname(__DIR__). DIRECTORY_SEPARATOR. 'data'.DIRECTORY_SEPARATOR.'compteur';

   return file_get_contents($fichier);
}