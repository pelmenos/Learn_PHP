<?php
//Придумайте способ обойтись без использования функции count.
$carsSpeeds = [
    95,
    140,
    78
];

$sumOfSpeeds = 0;
$countOfItem = 0;

foreach ($carsSpeeds as $speed) {
    $sumOfSpeeds += $speed;
    $countOfItem += 1;
}

$averageSpeed = $sumOfSpeeds / $countOfItem;

echo 'Средняя скорость движения по трассе: ' . $averageSpeed;