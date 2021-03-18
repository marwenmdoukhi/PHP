<?php
require 'Form.php';
require 'text.php';

$form =new Form($_POST);

$text=Text::publicwithzero(10);

var_dump($text);
?>

<form method="post" action="">
<?php

echo $form->input('username');
echo  $form->input('password');
$form->submit();

?>

</form>
