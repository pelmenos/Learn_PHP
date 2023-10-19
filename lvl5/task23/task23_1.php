<?php
$line = '-2 1 -3 4 -1 2 1 -5 4';
$nums = explode(' ', $line);

$maxSumCurrent = $nums[0];
$maxSumTotal = $nums[0];

for ($i = 1; $i < count($nums); $i++) {
    $num = $nums[$i];

    $maxSumCurrent += $num;

    if ($maxSumCurrent < $num) {
        $maxSumCurrent = $num;
    }

    if ($maxSumCurrent > $maxSumTotal) {
        $maxSumTotal = $maxSumCurrent;
    }
}

echo $maxSumTotal;