<?php

namespace App;

class Form {

public static $class = 'form-control';

    public static function myCheckbox(string $name, string $value = null, array $data = []): string
    {
        $attributes = '';
        if (isset($data[$name]) && in_array($value, $data[$name]))
            $attributes .= 'checked';
            $class = self::$class;
        return <<<HTML
     <input type="checkbox" name="{$name}[]" value="$value" $attributes class="{$class}"> 
HTML;
    }
}