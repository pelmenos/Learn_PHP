<?php
function numbers(int $x) {
    if ($x == 0) {
        echo $x;
        return;
    }
    numbers($x - 1);
    echo ', ' . $x;
}

function factorial(int $y) {
    if ($y == 1) {
        return 1;
    }
    return $y * factorial($y - 1);
}

echo factorial(5) . '<br>';
numbers(11);