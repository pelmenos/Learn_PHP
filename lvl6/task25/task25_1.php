<?php
$elements = explode(' ', trim(fgets(STDIN)));
$k = (integer) trim(fgets(STDIN));

function find(array $array, int $count): array
{
    if ($count === 1) {
        return $array;
    }

    $lowLevelCombinations = find($array, $count - 1);

    $currentLevelCombinations = [];
    foreach ($array as $item) {
        foreach ($lowLevelCombinations as $lowLevelCombination) {
            $currentLevelCombinations[] = trim($item . ' ' . $lowLevelCombination);
        }
    }
    return $currentLevelCombinations;
}

foreach (find($elements, $k) as $combination) {
    echo $combination . PHP_EOL;
}