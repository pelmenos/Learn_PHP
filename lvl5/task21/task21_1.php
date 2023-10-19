<?php
//На вход подается строка из чисел, разделенных пробелами.
//Найдите наиболее часто встречающееся число в строке.

$line = trim(fgets(STDIN));
$nums = explode(' ', $line);
$arrayOfCount = [];
$currentMaxFreq = 1;
$currentMaxNum = $nums[0];

foreach ($nums as $num) {
    if (isset($arrayOfCount[$num])) {
        $arrayOfCount[$num]++;
    } else {
        $arrayOfCount[$num] = 1;
    }

    if ($arrayOfCount[$num] > $currentMaxFreq) {
        $currentMaxFreq = $arrayOfCount[$num];
        $currentMaxNum = $num;
    }
}

echo $currentMaxNum;
