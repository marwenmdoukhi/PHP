<?php

class  Form{


    public static  $class="form-controle";

    public static function checkbox(string $name, string $value, array $data): string
    {

        $attrbut = '';
        if (isset($data[$name]) && in_array($value, ($data[$name]))) {
            $attrbut .= 'checked';
        }

        $attrbut='class';
        return <<<HTML
        
         <input type="checkbox" name="{$name}[]" value="$value" $attrbut >
        HTML;
    }





}