<?php
use \Tutoriel\HTML\BootstrapForm;
use \Tutoriel\Autoloader;
?>

<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    <meta charset="utf-8">
    <title>PHP oriente objet</title>
  </head>
  <body>
    <?php
    require 'class/Autoloader.php';
    Autoloader::register();

    $form = new BootstrapForm($_POST);
    ?>

    <form action="#" method="post">
      <?php
      echo $form->input('Username');
      echo $form->input('Password');
      echo $form->submit();
      ?>
    </form>

  </body>
</html>
