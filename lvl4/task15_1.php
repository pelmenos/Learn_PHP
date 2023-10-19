<?php
$arrayOfNum = [];
$i = 345;
while ($i <= 357) {
    if ($i % 2 == 0) {$arrayOfNum[] = $i;}
    $i++;
}
foreach($arrayOfNum as $item) {
    echo $item . '<br>';
}