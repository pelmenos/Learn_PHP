<?php
function array_multiple(array $nums, $exKey): int {     //по хорошему надо назвать arrayMultiple,
    $result = 1;                                 // но все функции над массивами в php писались через подчеркивание
    foreach ($nums as $key => $num){
        if ($exKey != $key){
            $result *= $num;
        }
    }
    return $result;
}

$line = trim(fgets(STDIN));
$nums = explode(' ', $line);
foreach ($nums as $key => $value) {
    echo array_multiple($nums, $key) . ' task22_1.php';
}