<?php

use App\UrlHelper;
use App\NumberHelper;
use App\QueryBuilder;
use App\TableHelper;
use App\Table;

define('PER_PAGE', 10);

require '../vendor/autoload.php';
$pdo = new PDO("sqlite:../data.sql", null, null, [
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
]);

$query = (new QueryBuilder($pdo))->from('products');


//Recherche par ville
if (!empty($_GET['q'])) {
    $query
        ->where('city LIKE :city')
        ->setParam('city', '%' . $_GET['q'] . '%');
}



$table = (new Table($query, $_GET))
    ->sortable('id', 'city', 'price')
    ->format('price', function ($value) {
        return NumberHelper::price($value);
    })
    ->columns([
        'id'  => 'ID',
        'name' => 'Nom du bien',
        'city' => 'Ville',
        'price' => 'Prix'
    ]);



?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Biens immobiliers</title>
</head>

<body class="p-4">
    <h1>Liste des biens immobiliers</h1>
    <form action="" class="mb-4">
        <div class="form-group">
            <input type="text" class="form-control" name="q" placeholder="Rechercher par ville" value="<?= htmlentities($_GET['q'] ?? null) ?>">
        </div>
        <button type="submit" class="btn btn-primary">Rechercher</button>
    </form>

    <?php $table->render() ?>


</body>

</html>