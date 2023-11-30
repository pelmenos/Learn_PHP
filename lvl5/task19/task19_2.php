<?php
$line1 = 'abc';
$line2 = 'cba';

if (strlen($line1) !== strlen($line2)) {
    echo 'no';
    return;
}

$lineSymbols1 = [];
$lineSymbols2 = [];

$len = strlen($line1);
for ($i = 0; $i < $len; $i++) {
    if (isset($lineSymbols1[$line1[$i]])) {
        $lineSymbols1[$line1[$i]]++;
    } else {
        $lineSymbols1[$line1[$i]] = 1;
    }

    if (isset($lineSymbols2[$line2[$i]])) {
        $lineSymbols2[$line2[$i]]++;
    } else {
        $lineSymbols2[$line2[$i]] = 1;
    }
}

foreach ($lineSymbols1 as $symbol => $count) {
    if (!isset($lineSymbols2[$symbol]) || $lineSymbols2[$symbol] !== $count) {
        echo 'no';
        return;
    }
}
echo 'yes';