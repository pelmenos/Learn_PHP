<?php
$login = !empty($_GET['login']) ? $_GET['login'] : '';
$password = !empty($_GET['password']) ? $_GET['password'] : '';
?>

<html>
<head>
    <title>Результат авторизации</title>
</head>
<body>
<p>
    <?= $login !== 'admin' ? 'Пользователь не найден' :
        ($password !== 'Pa$$w0rd' ? 'Неверный пароль' : 'Логин  пароль верные') ?>
</p>
</body>
</html>