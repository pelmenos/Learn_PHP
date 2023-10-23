<?php
function factorial(int $x): int {
    if ($x == 1) {
        return 1;
    }
    return $x * factorial($x - 1);
}

echo factorial(5);