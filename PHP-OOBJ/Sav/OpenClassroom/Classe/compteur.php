<?php
class Compteur
{
  private static $_compteur = 0;

   public function __construct()
   {
     self::$_compteur += 1;
   }

   public static function getCompteur()
   {
     return self::$_compteur;
   }
}
