<?php
function wholeNumbers($x): void {
    if ($x === 0) {
        echo $x;
        return;
    }
    wholeNumbers($x - 1);
    echo ', ' . $x;
}

wholeNumbers(11);