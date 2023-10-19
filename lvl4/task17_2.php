<?php
function countInArray(array $array, int $num)
{
    $i = 0;
    foreach ($array as $item) {
        if ($item === $num) {
            $i++;
        }
    }
    return $i;
}