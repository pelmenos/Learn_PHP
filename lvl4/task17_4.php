<?php
$n = (int)trim(fgets(STDIN));

if ($n === 0) {
    return;
}

if ($n === 1) {
    echo 0;
    return;
}

$fib = [0, 1];
for($i=1; $i < $n-1; $i++) {
    $fib[] = $fib[$i] + $fib[$i-1];
}

echo implode(' ', $fib);