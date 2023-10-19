<?php
if (!empty($_COOKIE)) {
    setcookie('login', '', 0, '/');
    setcookie('password', '', 0, '/');
}
header('Location: /lvl5/task23/index.php');