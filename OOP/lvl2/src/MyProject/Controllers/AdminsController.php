<?php

namespace MyProject\Controllers;

use MyProject\Exceptions\ForbiddenException;
use MyProject\Exceptions\InvalidArgumentException;
use MyProject\Exceptions\NotFoundException;
use MyProject\Exceptions\UnauthorizedException;
use MyProject\Models\Articles\Article;
use MyProject\Models\Comments\Comment;

class AdminsController extends AbstractController
{
    public function view(): void
    {
        if ($this->user === null) {
            throw new UnauthorizedException();
        }
//        if (!$this->user->isAdmin()) {
//            throw new ForbiddenException('Эта страница доступна только админам');
//        }

        $articles = Article::findAll();
        $comments = Comment::findAll();

        $this->view->renderHtml('admin/view.php', ['articles' => $articles, 'comments' => $comments], title: 'Админ панель');
    }

    public function lastArticles(): void
    {
        if ($this->user === null) {
            throw new UnauthorizedException();
        }
        if (!$this->user->isAdmin()) {
            throw new ForbiddenException('Эта страница доступна только админам');
        }

        $articles = Article::findLasts(5);
        $this->view->renderHtml('admin/articles.php', ['articles' => $articles], title: 'Админ панель | Статьи');
    }

    public function lastComments(): void
    {
        if ($this->user === null) {
            throw new UnauthorizedException();
        }
        if (!$this->user->isAdmin()) {
            throw new ForbiddenException('Эта страница доступна только админам');
        }

        $comments = Comment::findLasts(5);
        $this->view->renderHtml('admin/comments.php', ['comments' => $comments], title: 'Админ панель | Комментарии');
    }

    public function editArticles(int $articleId): void
    {
        $article = Article::getById($articleId);

        if ($article === null) {
            throw new NotFoundException();
        }

        if ($this->user === null) {
            throw new UnauthorizedException();
        }

        if (!($this->user->isAdmin())){
            throw new ForbiddenException('Доступно только для админов');
        }


        if (!empty($_POST)) {
            try {
                $article->editFromArray($_POST);
            } catch (InvalidArgumentException $e) {
                $this->view->renderHtml('admin/editArticle.php', ['error' => $e->getMessage(), 'article' => $article]);
                return;
            }

            header('Location: /OOP/lvl2/www/admin/articles', true, 302);
            exit();
        }

        $this->view->renderHtml('admin/editArticle.php', ['article' => $article, 'user' => $this->user]);
    }

    public function editComments(int $commentId): void
    {
        $comment = Comment::getById($commentId);

        if ($comment === null) {
            throw new NotFoundException();
        }

        if ($this->user === null) {
            throw new UnauthorizedException();
        }

        if (!($this->user->isAdmin())){
            throw new ForbiddenException('Доступно только для админов');
        }


        if (!empty($_POST)) {
            try {
                $comment->editComment($_POST);
            } catch (InvalidArgumentException $e) {
                $this->view->renderHtml('admin/editComment.php', ['error' => $e->getMessage(), 'comment' => $comment]);
                return;
            }

            header('Location: /OOP/lvl2/www/admin/comments', true, 302);
            exit();
        }

        $this->view->renderHtml('admin/editComment.php', ['comment' => $comment, 'user' => $this->user]);
    }
}