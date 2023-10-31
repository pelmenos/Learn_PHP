<?php

namespace MyProject\Controllers;

use MyProject\Models\Users\User;
use MyProject\Models\Users\UsersAuthService;
use MyProject\View\View;
use MyProject\Models\Articles\Article;

class MainController extends AbstractController
{

    public function main(): void
    {
        $articles = Article::findAll();
        $this->view->renderHtml('main/main.php', [
            'articles' => $articles,
            'user' => UsersAuthService::getUserByToken()
        ]);
    }

    public function sayHello(string $name): void
    {
        $this->view->renderHtml('main/hello.php', ['name' => $name], 'Страница приветствия');
    }

    public function sayBye(string $name): void
    {
        echo 'Пока, ' . $name;
    }
}