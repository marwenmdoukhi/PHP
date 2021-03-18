<?php

class Form
{
    /**
     * @var
     */
    private  $data  ;

    /**
     * @var string
     */
    public $surround ='p';

    /**
     * Form constructor.
     * @param $data
     */
    public function __construct($data)
    {

        $this->data=$data;
    }

    /**
     * @param $html
     * @return string
     */
    private  function surround($html)
    {
        return"<{$this->surround}>{$html} </{$this->surround}  >";

    }

    /**
     * @param $index
     * @return mixed|null
     */
    private function getvalue($index)
    {

        /*
        if (isset($this->data[$index]))
        return $this->data[$index];
        else{
            return  null;
        }

        */
        //ecritture ternaire ? if : else

        return  isset($this->data[$index])? $this->data[$index] : null;


    }

    /**
     * @param $name
     * @return string
     */
    public function input($name)
    {
       return $this->surround( '<input  type="text"  value="'.$this->getvalue($name).'"  name="'. $name .'">');

    }

    /**
     *
     */
    public function submit()
    {
        echo '<button type="sumbit">envoyer</button>';

    }

}