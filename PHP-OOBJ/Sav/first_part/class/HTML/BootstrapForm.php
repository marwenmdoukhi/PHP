<?php
namespace Tutoriel\HTML;
class BootstrapForm extends Form
{
  public function input($name)
  {
    return $this->surround('<label>' . $name . '</label>' . '<input type="text" name="' . $name . '" value="' . $this->getValue($name) .'">');
  }

  protected function surround($html)
  {
    return '<div class="form-group"' . $html . '</div>';
  }

  public function submit()
  {
    return '<button class="btn btn-primary" type="submit">Envoyer</button>';
  }
}
