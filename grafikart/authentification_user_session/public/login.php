<?php

require '../vendor/autoload.php';

use App\App;
use App\Auth;

session_start();


$auth = App::getAuth() ;
$error  = false;
/*
if ($auth->user() !== null) {
    header('Location: index.php');
    exit;
}
*/

if (!empty($_POST)) {

    $user = $auth->login($_POST['username'], $_POST['password']);
    if ($user) {
        header('Location: index.php?login=1');
        exit();
    }
    $error = true;
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>

<body class="p-4">
    <h1>Se connecter</h1>

    <?php if ($error) : ?>
        <div class="alert alert-danger">
            Identifiant ou mot de passe incorrect
        </div>
    <?php endif ?>

    <?php if (isset($_GET['forbid'])) : ?>
        <div class="alert alert-danger">
           Veuillez vous connecter en tant que admin pour accéder à cette page
        </div>
    <?php endif ?>

    <form action="" method="post">
        <div class="form-group">
            <input type="text" name="username" class="form-control" placeholder="Pseudo">
            <input type="password" name="password" class="form-control" placeholder="Mot de passe">

        </div>
        <button class="btn btn-primary">Se connecter</button>
    </form>
</body>

</html>