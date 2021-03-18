<?php
 require_once 'vendor/autoload.php';
use App\OpenWeather;
use App\Exceptions\APIExection;
//require_once 'class/OpenWeather.php';
$weather = new OpenWeather('9c49e45c49a67412656bfc9eaa8d2ecf');
$error = null;
try {
    $forecast = $weather->getForecast('Brussels,be');
    $today = $weather->getToDay('Brussels,be');
} catch (APIExection $e) {
    $error = "Erreurs relative à l'Api";
} catch (Exception $e) {
    $error = $e->getMessage();
}

require_once 'elements/header.php';
?>

<?php if ($error) : ?>
    <div class="alert alert-danger">
        <?= $error ?>
    </div>
<?php else : ?>

    <div class="container">
        <ul>
            <div class="text-info">
                <li>En ce moment <?= $today['description'] ?><?= $today['temp'] ?>°C</li>
            </div>


            <?php foreach ($forecast as $day) : ?>
                <li><?= $day['date']->format('d/m/Y') ?>
                    <?= $day['description'] ?>
                    <?= $day['temp'] ?>°C
                </li>
            <?php endforeach ?>
        </ul>
    </div>
<?php endif ?>






<?php require_once 'elements/footer.php'; ?>

