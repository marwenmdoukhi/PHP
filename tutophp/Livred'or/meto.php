<?php
declare(strict_types=1);

use App\Openwewater;

require_once 'class/Openwewater.php';

$weather=new Openwewater('754d536590c116cf1f9dc285dd90ef6e');
$error = null;
try {
    $foract = $weather->getForecast('London,fr');
    $today = $weather->getToday('London,fr');
}  catch (Exception |Error  $e) {
    echo $e->getMessage();

}
?>
<?php if ($error): ?>

    <?= $error ?>

<?php else: ?>
<h1>La météo à aujourd'hui</h1>
<?= $today['temp']?>
<?php foreach($foract as $jour): ?>
    <li>Jour: <?= $jour['date']->format('d/m/Y H:i') ?>température<?= $jour['temp']?>, <?=$jour['description']?> </li>
<?php endforeach ?>

<?php endif ?>
