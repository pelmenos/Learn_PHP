<?php
function moreThanTwo(int $num) {
    return $num >= 2;
}
$line = trim(fgets(STDIN));
$nums = explode(' ', $line);
$arrayOfCount = [];

foreach ($nums as $num) {
    if (isset($arrayOfCount[$num])) {
        $arrayOfCount[$num]++;
    } else {
        $arrayOfCount[$num] = 1;
    }
}

$filteredArray = array_filter($arrayOfCount, "moreThanTwo");
foreach ($filteredArray as $key => $value) {
    echo $key . ' ';
}
