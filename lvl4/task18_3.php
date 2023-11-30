<?php
$line = trim(fgets(STDIN));
$nums = explode(' ', $line);

$numsPrinted = [];
foreach ($nums as $num) {
    if (!isset($numsPrinted[$num])) {
        $numsPrinted[$num] = true;
        echo $num . ' ';
    }
}
