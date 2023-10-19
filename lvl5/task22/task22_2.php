<?php
$line = trim(fgets(STDIN));
$nums = explode(' ', $line);

$maxDiff = null;
foreach ($nums as $i => $num1) {
    for ($j = $i + 1; $j < count($nums); $j++) {
        $num2 = $nums[$j];

        if ($num1 <= $num2) {
            continue;
        }

        if ($maxDiff === null) {
            $maxDiff = $num1 - $num2;
            continue;
        }

        $maxDiff = max($maxDiff, $num1 - $num2);
    }
}
echo $maxDiff;