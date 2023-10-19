<?php
if (!empty($_POST)) {
    require __DIR__ . '/auth.php';

    $login = $_POST['login'] ?? '';
    $password = $_POST['password'] ?? '';

    if (checkAuth($login, $password)) {
        setcookie('login', $login, 0, '/');
        setcookie('password', $password, 0, '/');
        header('Location: /lvl5/task23/index.php');
    } else {
        $error = 'Ошибка авторизации';
    }
}
if (!empty($_COOKIE)) {
    require __DIR__ . '/auth.php';

    $login = $_COOKIE['login'] ?? '';
    $password = $_COOKIE['password'] ?? '';

    if (checkAuth($login, $password)) {
        header('Location: /lvl5/task23/index.php');
    }
}
?>
<html>
<head>
    <title>Форма авторизации</title>
</head>
<body>
<?php if (isset($error)): ?>
    <span style="color: red;">
        <?= $error ?>
    </span>
<?php endif; ?>
<form action="/lvl5/task23/login.php" method="post">
    <label for="login">Имя пользователя: </label><input type="text" name="login" id="login">
    <br>
    <label for="password">Пароль: </label><input type="password" name="password" id="password">
    <br>
    <input type="submit" value="Войти">
</form>
</body>
</html>