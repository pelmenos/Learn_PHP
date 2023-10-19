<?php
//На вход подается строка из чисел, разделенных пробелами.
//Переместите все нули в конец строки. Порядок остальных чисел должен сохраниться.
$line = trim(fgets(STDIN));
$nums = explode(' ', $line);
foreach ($nums as $key => $value){
    if ($value == 0) {
        unset($nums[$key]);
        $nums[] = 0;
    }
}
echo implode(' ', $nums);