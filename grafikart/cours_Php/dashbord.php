<?php


require_once 'functions/auth.php';
forcer_utilisateur_connecte();
require_once 'functions/compteur.php';
$total = nombre_de_vues();
$annee_en_cours = (int) date('Y');
$annee_selected = empty($_GET['annee']) ? null : (int) $_GET['annee'];
$mois_selected = empty($_GET['mois']) ? null : (int) $_GET['mois'];
if ($annee_selected && $mois_selected) {
    $total = nombre_de_vues_par_mois($annee_selected, $mois_selected);
    $detail = nombre_de_vues_details_mois($annee_selected, $mois_selected);
} else {
    $total = nombre_de_vues();
}

$mois = [
    '01' => 'Janvier',
    '02' => 'Février',
    '03' => 'Mars',
    '04' => 'Avril',
    '05' => 'Mai',
    '06' => 'Juin',
    '07' => 'Juillet',
    '08' => 'Aout',
    '09' => 'Sepembre',
    '10' => 'Octobre',
    '11' => 'Novembre',
    '12' => 'Décembre'
];
require 'elements/header.php';

?>

<h1>Bienvenue dans le Dashbord</h1><br><br>

<div class="row">
    <div class="col-md-4">
        <div class="list-group">
            <?php for ($i = 0; $i < 5; $i++) : ?>
                <a class="list-group-item <?= $annee_en_cours - $i === $annee_selected ? 'active' : ''; ?>" href="dashbord.php?annee=<?= $annee_en_cours - $i ?>">Voir les stats de <?= $annee_en_cours - $i ?></a>
                <?php if ($annee_en_cours - $i === $annee_selected) : ?>
                    <div class="div list-group">
                        <?php foreach ($mois as $num => $moi) : ?>
                            <a class="list-group-item <?= (int) $num === $mois_selected ? 'active' : '' ?>" href="dashbord.php?annee=<?= $annee_selected ?>&mois=<?= $num ?>">
                                <?= $moi ?>
                            </a>

                        <?php endforeach ?>
                    </div>
                <?php endif ?>
            <?php endfor ?>

        </div>
    </div>

    <div class="col-md-8">
        <div class="card mb-4">
            <div class="card-body">
                <strong style="font-size:3em;"><?= $total ?></strong> Visite(s)

            </div>

        </div>
        <?php if (isset($detail)) : ?>
            <h2>Détails des visites pour le mois de <?= $mois[$_GET['mois']] ?> <?= $annee_selected ?></h2>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Année</th>
                        <th>Mois</th>
                        <th>Jour</th>
                        <th>Nombres de visites</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($detail as $ligne) : ?>
                        <tr>
                            <td><?= $ligne['annee'] ?></td>
                            <td><?= $ligne['mois'] ?></td>
                            <td><?= $ligne['jour'] ?></td>
                            <td><?= $ligne['visites'] ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif ?>
    </div>
</div>

<?php require 'elements/footer.php'; ?>