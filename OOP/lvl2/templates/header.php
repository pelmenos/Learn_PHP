<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Мой блог</title>
    <link rel="stylesheet" href="/OOP/lvl2/style.css">
</head>
<body>
<table class="layout">
    <tr>
        <td colspan="2" class="header">
            <?= $title ?>
        </td>
    </tr>
    <tr>
        <td colspan="2" style="text-align: right">
            <?= !empty($user) ? 'Привет, ' . $user->getNickname() . ' | <a href="/OOP/lvl2/www/users/logout">Выйти</a>'
                : '<a href="/OOP/lvl2/www/users/login">Войти</a> | <a href="/OOP/lvl2/www/users/register">Регистрация </a>' ?>
        </td>
    </tr>
    <tr>
        <td>
