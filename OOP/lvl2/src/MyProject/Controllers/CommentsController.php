<?php
namespace MyProject\Controllers;



use MyProject\Exceptions\ForbiddenException;
use MyProject\Exceptions\InvalidArgumentException;
use MyProject\Exceptions\NotFoundException;
use MyProject\Exceptions\UnauthorizedException;
use MyProject\Models\Comments\Comment;

class CommentsController extends AbstractController
{
    public function create(int $article_id): void
    {
        if ($this->user === null) {
            throw new UnauthorizedException();
        }

        if (!empty($_POST)) {
            try {
                $comment = Comment::createComment($_POST, $article_id, $this->user->getId());
            } catch (InvalidArgumentException $e) {
                $this->view->renderHtml('comments/add.php', ['error' => $e->getMessage()]);
                return;
            }

            header('Location: /OOP/lvl2/www/articles/' . $article_id . '#' . $comment->getId(), true, 302);
            exit();
        }

    }
    public function edit(int $commentId): void
    {
        $comment = Comment::getById($commentId);

        if ($comment === null) {
            throw new NotFoundException();
        }

        if ($this->user === null) {
            throw new UnauthorizedException();
        }

        if (!($this->user->isAdmin() || $comment->isAuthor($this->user))){
            throw new ForbiddenException('Для изменения комментария нужно быть админом или автором комментария');
        }


        if (!empty($_POST)) {
            try {
                $comment->editComment($_POST);
            } catch (InvalidArgumentException $e) {
                $this->view->renderHtml('comments/edit.php', ['error' => $e->getMessage(), 'comment' => $comment]);
                return;
            }

            header('Location: /OOP/lvl2/www/articles/' . $comment->getArticleId() . '#' . $comment->getId(), true, 302);
            exit();
        }

        $this->view->renderHtml('comments/edit.php', ['comment' => $comment, 'user' => $this->user]);
    }
}