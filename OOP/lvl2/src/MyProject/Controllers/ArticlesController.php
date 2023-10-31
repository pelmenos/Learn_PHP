<?php

namespace MyProject\Controllers;

use MyProject\Exceptions\ForbiddenException;
use MyProject\Exceptions\InvalidArgumentException;
use MyProject\Exceptions\NotFoundException;
use MyProject\Exceptions\UnauthorizedException;
use MyProject\Models\Comments\Comment;
use MyProject\Models\Users\UsersAuthService;
use MyProject\Models\Articles\Article;

class ArticlesController extends AbstractController
{

    public function view(int $articleId): void
    {
        $article = Article::getById($articleId);
        $user = UsersAuthService::getUserByToken();

        if ($article === null) {
            throw new NotFoundException();
        }
        $comments = Comment::findArticleComments($article);
        $this->view->renderHtml('articles/view.php', ['article' => $article, 'user' => $user, 'comments' => $comments]);
    }

    public function create(): void
    {
        if ($this->user === null) {
            throw new UnauthorizedException();
        }
        if (!$this->user->isAdmin()){
            throw new ForbiddenException('Для добавления статьи нужно обладать правами администратора');
        }

        if (!empty($_POST)) {
            try {
                $article = Article::createFromArray($_POST, $this->user);
            } catch (InvalidArgumentException $e) {
                $this->view->renderHtml('articles/add.php', ['error' => $e->getMessage()]);
                return;
            }

            header('Location: /OOP/lvl2/www/articles/' . $article->getId(), true, 302);
            exit();
        }

        $this->view->renderHtml('articles/add.php');
    }

    public function edit(int $articleId): void
    {
        $article = Article::getById($articleId);

        if ($article === null) {
            throw new NotFoundException();
        }

        if ($this->user === null) {
            throw new UnauthorizedException();
        }

        if (!$this->user->isAdmin()){
            throw new ForbiddenException('Для изменения статьи нужно обладать правами администратора');
        }

        if (!empty($_POST)) {
            try {
                $article->editFromArray($_POST);
            } catch (InvalidArgumentException $e) {
                $this->view->renderHtml('articles/edit.php', ['error' => $e->getMessage(), 'article' => $article]);
                return;
            }

            header('Location: /OOP/lvl2/www/articles/' . $article->getId(), true, 302);
            exit();
        }

        $this->view->renderHtml('articles/edit.php', ['article' => $article]);
    }

    public function del(int $articleId): void
    {
        $article = Article::getById($articleId);

        if ($article === null) {
            throw new NotFoundException();
        }

        $article->delete();
    }
}