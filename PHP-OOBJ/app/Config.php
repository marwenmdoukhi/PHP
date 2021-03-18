<?php
namespace App;

class Config
{
	private $settings = [];

    //creation d'un varbile static

    private static $_instance;

    //aavoir l'instance
    //stoker l'instance qu on va crée $instance
    //quand on onva la insatnce pleuseur fois ona toujour la meme instance

    public static function getInstance()
    {

        if (is_null(self::$_instance)){

            return self::$_instance=new Config();
        }
        return self::$_instance;


    }


        public function __construct()
	{
	    $this->id=uniqid();
		$this->settins = require dirname(__DIR__) . '/config/config.php';
	}


	public function get($key){

        if(!isset($this->settings[$key])){

            return null;
        }
        return $this->settings[$key];
    }


}