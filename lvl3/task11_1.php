<?php
function numbers(int $x): void {
    if ($x == 0) {
        echo $x;
        return;
    }
    numbers($x - 1);
    echo ', ' . $x;
}

function factorial(int $y): int {
    if ($y == 1) {
        return 1;
    }
    return $y * factorial($y - 1);
}

echo factorial(5) . '<br>';
numbers(11);