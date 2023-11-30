<?php

$line = trim(fgets(STDIN));
$array = explode(' ', $line);
foreach ($array as $num){
    if ($num % 2 === 0) {
        echo $num . ' ';
    }
}