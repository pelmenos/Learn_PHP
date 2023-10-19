<?php

$content = '<h1>Заголовок статьи</h1><p>Текст какой-то статьи</p>';
$footer = '<h1>Как ноги</h1><p>Но всё же футер</p>';
$header = '<h1>Как голова</h1><p>Но всё же хедер</p>';
$sidebar = '<h1>Это сайдбар</h1><ul><li>Один выбор</li><li>Второй выбор</li></ul>';

require __DIR__ . '/header.php';
require __DIR__ . '/sidebar.php';
require __DIR__ . '/content.php';
require __DIR__ . '/footer.php';