<?php

require  'header.php';
require_once 'data/compteur.php';
$total=nbvisite() ;
$anne=(int)date('Y-m-d');
?>



<div class="row">
    <div class="col-md-4">
        <div class="list-group">
            <?php for ($i=0; $i<5; $i++) : ?>
            <div class="list-group-item">

                <a href="dashbord.php?<?= $anne- $i ?>" >  <?= $anne- $i ?></a>
            </div>
            <?php endfor; ?>
        </div>


    </div>
    <div class="col-md-8">

        <div class="card">
            <div class="card-body">

                <STRONG>total</STRONG>
                <?= $total ?>
                <br>
                visite<?=  $total>1 ? 's':'' ?> total

            </div>
        </div>
    </div>
</div>


