<?php

    class Text
    {


        const SUFFIX="E";
        public static function publicwithzero($chiffre)
        {
            return self::withzero($chiffre) . self::SUFFIX;
        }

        private static function withzero($chiffre)
        {
            if ($chiffre<10){
                return '0'. $chiffre ;
            }else{

                return $chiffre;
            }



        }






    }