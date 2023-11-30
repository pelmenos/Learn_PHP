<?php
$line = trim(fgets(STDIN));
$nums = explode(' ', $line);

$max = $nums[0] * $nums[1];
foreach($nums as $i => $num1) {
    foreach($nums as $j => $num2) {
        if ($i === $j) {
            continue;
        }
        $item = $num1 * $num2;
        if ($item > $max) {
            $max = $item;
        }
    }
}
echo $max;