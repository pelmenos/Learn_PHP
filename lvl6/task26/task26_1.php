<?php
$nums = explode(' ', trim(fgets(STDIN)));

usort($nums, function (string $a, string $b) {
    $ab = $a . $b;
    $ba = $b . $a;
    return $ba <=> $ab;
});

echo implode('', $nums);