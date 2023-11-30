<?php
$line = explode(" ", trim(fgets(STDIN)));
echo implode(" ", array_reverse($line));
