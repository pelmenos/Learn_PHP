<?php
$files = scandir(__DIR__ . 'task24_2.php/');
foreach ($files as $file) {
    if (is_dir($file)) {
        echo $file . '<br>';
    }
}