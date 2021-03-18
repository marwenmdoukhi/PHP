<?php


$title = 'Nous Contacter';
require_once 'config.php';
require_once 'functions.php';
date_default_timezone_set('Europe/Brussels');
//recuperer l'heure d'aujourd hui dans $heure
//recuperer les creneaux d'aujourd hui dans $creneaux
//recuperer l'etat d'ouverture du magasin
$heure = (int)($_GET['heure'] ?? date('G'));
$jour = (int) ($_GET['jour'] ?? date('N') - 1);
$creneaux = CRENEAUX[$jour];
$ouvert = in_creneaux($heure, $creneaux);
$color = $ouvert ? 'green' : 'red';

require 'elements/header.php';

?>
<div class="row">
    <div class="col-md-8">
        <h2>Nous Contacter</h2>
        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit.
            Molestiae est quibusdam sapiente, corporis dolores qui reprehenderit saepe distinctio facere.
            Reprehenderit dignissimos error dolore magni vitae suscipit rerum cupiditate excepturi exercitationem.</p>
    </div>
    <div class="col-md-4">
        <h2>Horaires d'ouverture</h2>

        <?php if ($ouvert) : ?>
            <div class="div alert alert-success">
                Le magasin sera ouvert
            </div>
        <?php else : ?>
            <div class="div alert alert-danger">
                Le magasin sera fermé
            </div>
        <?php endif ?>

        <form action="" method="GET">
            <div class="div form-group">
                <?= select_jour('jour', $jour, JOURS) ?>
            
            </div>
            <div class="div form-group">
                <input type="number" name="heure" class="form-control" value="<?= $heure ?>">
            </div>
            <button type="submit" class="btn btn-primary">Vérifier si c'est ouvert</button>
        </form>

        <ul>
            <?php foreach (JOURS as $k => $jour) : ?>
                <li>

                    <strong><?= $jour ?></strong> :
                    <?= creneaux_html(CRENEAUX[$k]); ?>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>


<?php require 'elements/footer.php'; ?>