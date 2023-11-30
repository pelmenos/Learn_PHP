<?php
function findNum(array $array, int $num): bool
{
    foreach ($array as $item) {
        if ($item === $num) {
            return true;
        }
    }
    return false;
}