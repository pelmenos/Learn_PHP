<?php
$array = [3, 1, 2];
sort($array);
$line = implode(':', $array);
echo $line;