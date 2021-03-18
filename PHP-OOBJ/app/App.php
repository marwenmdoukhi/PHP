<?php

namespace App;

use App\Table;

class App
{

	private static $title = 'mon super site';

    private  static  $_instance;


    public static function getInstance(){

        if (is_null(self::$_instance)){
            self::$_instance = new App();
        }
        return self::$_instance;
    }

    public static function getTable($name)
    {

        $class_name='\\App\\Table\\' .ucfirst($name) .'Table';

        return new $class_name();


    }



}