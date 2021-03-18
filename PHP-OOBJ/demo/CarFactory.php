<?php


class  CarFactory

{

    public static function getcar($type)
    {
        $type=ucfirst($type);
        $class_name="car$type";
        return new $class_name();

    }




}
