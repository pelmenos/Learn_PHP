<?php
$line = '1 2 3';
$nums = explode(' ', $line);
for ($i = 0; $i < count($nums); $i++){
    for ($j = 0; $j < count($nums); $j++){
        if ($i != $j){
            echo $nums[$i] . ' ' . $nums[$j] . PHP_EOL;
        }
    }
}