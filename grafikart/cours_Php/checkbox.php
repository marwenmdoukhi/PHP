<?php



//checkbox
$parfums = [
    'Fraise' => 4,
    'Chocolat' => 5,
    'Vanille' => 3
];
//radio
$cornets = [
    'Pot' => 2,
    'Cornet' => 3
];
//checkbox
$supplements = [
    'Pépites de chocolat' => 1,
    'Chantille' => 0.5
];


$title = "Composer votre glace";
$ingredients = [];
$total = 0;
if (isset($_GET['parfum'])) {
    foreach ($_GET['parfum'] as $parfum) {
        if (isset($parfums[$parfum])) {
            $ingredients[] = $parfum;
            $total += $parfums[$parfum];
        }
    }
}
if (isset($_GET['supplement'])) {
    foreach ($_GET['supplement'] as $supplement) {
        if (isset($supplements[$supplement])) {
            $ingredients[] = $supplement;
            $total += $supplements[$supplement];
        }
    }
}
if (isset($_GET['cornet'])) {
    $cornet = $_GET['cornet'];
    if (isset($cornets[$cornet])) {
        $ingredients[] = $cornet;
        $total += $cornets[$cornet];
    }
}

require 'elements/header.php';

?>

<h1>Composer votre glace</h1>


<div class="row">
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Votre Glace</dh5>
                    <ul>
                        <?php foreach ($ingredients as $ingredient): ?>
                        <li><?= $ingredient ?></li>
                        <?php endforeach ; ?>
                    </ul>
                    <p>
                        <strong>Prix: </strong> <?= $total ?> £
                    </p>
            </div>

        </div>

    </div>
    <div class="col-md-8">
        <form action="/checkbox.php" method="GET">

            <h2>Choisissez vos parfums</h2>
            <?php foreach ($parfums as $parfum => $prix) : ?>
                <div class="checkbox">
                    <label>
                        <?= myCheckbox('parfum', $parfum, $_GET) ?>"
                        <?= $parfum ?> - <?= $prix ?> £
                    </label>

                </div>
            <?php endforeach; ?>

            <h2>Choisissez cornet ou pot</h2>
            <?php foreach ($cornets as $cornet => $prix) : ?>
                <div class="checkbox">
                    <label>
                        <?= myRadio('cornet', $cornet, $_GET) ?>"
                        <?= $cornet ?> - <?= $prix ?> £
                    </label>

                </div>
            <?php endforeach; ?>

            <h2>Choisissez vos suppléments</h2>
            <?php foreach ($supplements as $Supplement => $prix) : ?>
                <div class="checkbox">
                    <label>
                        <?= myCheckbox('supplement', $Supplement, $_GET) ?>
                        <?= $Supplement ?> - <?= $prix ?> £
                    </label>
                </div>
            <?php endforeach; ?>
            <button type="submit" class="btn btn-primary">Composer ma glace</button>
        </form>

    </div>
</div>







<?php require 'elements/footer.php' ?>