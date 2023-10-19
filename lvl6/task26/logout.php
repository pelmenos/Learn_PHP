<?php
if (!empty($_COOKIE)) {
    setcookie('login', '', 0, '/');
    setcookie('password', '', 0, '/');
}
header('Location: /lvl6/task26/index.php');