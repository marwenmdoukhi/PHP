<?php
namespace Tutoriel\HTML;

class Form
{
  protected $data;
  public $surround = 'p';

  public function __construct($data = array())
  {
    $this->data = $data;
  }

  protected function getValue($index)
  {
    if (isset($this->data[$index]))
      return $this->data[$index];
    else
      return null;
  }

  protected function surround($html)
  {
    return "<{$this->surround}>{$html}</{$this->surround}>";
  }

  public function input($name)
  {
    return $this->surround('<input type="text" name="' . $name . '" value="' . $this->getValue($name) .'">');
  }

  public function submit()
  {
    return $this->surround('<button type="submit">Envoyer</button>');
  }

}
