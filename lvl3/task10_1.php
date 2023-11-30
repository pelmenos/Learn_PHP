<?php
function minFloat(float $x, float $y, float $z): float
{
    $min = $x;
    if ($min > $y) $min = $y;
    if ($min > $z) $min = $z;
    return $min;
}

echo minFloat(3.5, 10.8, 3.9);