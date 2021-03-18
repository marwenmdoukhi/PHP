<?php
function nav_item(string $lien, string $titre): string
{
    $classe = 'nav-item ';
    if ($_SERVER['SCRIPT_NAME'] === $lien) {
        $classe = $classe . 'active';
    }
    return '<li class="' . $classe . ' ">
                    <a class="nav-link" aria-current="page" href="' . $lien . '">' . $titre . '</a>
                </li>';


}

function checkbox(string $name, string $value, array $data): string
{
    $attrbut = '';
    if (isset($data[$name]) && in_array($value, ($data[$name]))) {
        $attrbut .= 'checked';
    }


    return <<<HTML
        
         <input type="checkbox" name="{$name}[]" value="$value" $attrbut>
HTML;
}

function radio(string $name, string $value, array $data): string
{
    $attrbut = '';
    if (isset($data[$name]) && $value === $data[$name]) {
        $attrbut .= 'checked';
    }


    return <<<HTML
        
         <input type="radio" name="{$name}" value="$value" $attrbut>
HTML;
}

function crenau_html(array $creneaux)
{

    $phrase = [];

    foreach ($creneaux as $creneau) {
        $phrase[]="de  {$creneau{0}}h a {$creneau{1}}" ;
    }
    return implode('et',$phrase);
}

?>