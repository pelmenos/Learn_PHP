<?php
function multiplyTwoNumByTwo(int &$x, int &$y) {
    $x *= 2;
    $y *= 2;
}
$x = 5;
$y = 9;
multiplyTwoNumByTwo($x, $y);
echo $x . ' ' . $y;