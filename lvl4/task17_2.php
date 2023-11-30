<?php
function countInArray(array $array, int $num): int
{
    $i = 0;
    foreach ($array as $item) {
        if ($item === $num) {
            $i++;
        }
    }
    return $i;
}