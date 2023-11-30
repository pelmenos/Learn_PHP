<?php
require __DIR__ . '/auth.php';
$login = getUserLogin();
?>
<html>
<head>
    <title>Фотоальбом</title>
</head>
<body>
<?php
$files = scandir(__DIR__ . '/uploads');
$links = [];
foreach ($files as $fileName) {
    if ($fileName === '.' || $fileName === '..') {
        continue;
    }
    $links[] = 'http://myproject.loc/lvl6/task26/uploads/' . $fileName;
}

foreach ($links as $link):?>
    <a href="<?= $link ?>"><img src="<?= $link ?>" height="80px"></a>
<?php endforeach; ?>
<?php if ($login === null): ?>
    <a href="/lvl6/task26/login.php">Авторизуйтесь</a>
<?php else: ?>
    Добро пожаловать, <?= $login ?>
    <br>
    <a href="/lvl6/task26/logout.php">Выйти</a>
<?php endif; ?>
</body>
</html>