<?php
$title="nous contacter";

require_once 'menufunction.php';
require_once 'config.php';
session_start();

$creneaux=crenau_html(CRENEAUX);
require 'header.php';?>
<br><br>
<br>
<br>
<br>
<br>
<h2>
    <?= var_dump($_SESSION) ?>

</h2>
<h1>nous contacter</h1>
<div class="row">
    <div class="col-md-8">

        test
    </div>

    <div class="col-md-4">


    </div>

########################
    <?= $creneaux ?>
    #############
</div>

<?php require 'footer.php';?>



