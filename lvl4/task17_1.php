<?php
function findNum(array $array, int $num)
{
    foreach ($array as $item) {
        if ($item === $num) {
            return true;
        }
    }
    return false;
}