<?php

use App\App;

require '../vendor/autoload.php';

$user = App::getAuth()->requireRole('user', 'admin');

?>
Réservé à l'utilisateur