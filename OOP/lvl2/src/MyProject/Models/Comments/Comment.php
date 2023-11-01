<?php

namespace MyProject\Models\Comments;

use MyProject\Exceptions\InvalidArgumentException;
use MyProject\Models\ActiveRecordEntity;
use MyProject\Models\Articles\Article;
use MyProject\Models\Users\User;
use MyProject\Services\Db;

class Comment extends ActiveRecordEntity
{
    protected string $text;
    protected int $authorId;
    protected int $articleId;
    protected ?string $createdAt = null;

    protected static function getTableName(): string
    {
        return 'comments';
    }

    public static function findArticleComments(Article $article): array
    {
        $db = Db::getInstance();
        $result = $db->query('SELECT * FROM ' . static::getTableName() . " WHERE article_id=:article_id",
        [':article_id' => $article->getId()],
        static::class);
        return $result;
    }

    public function getAuthor(): User
    {
        return User::getById($this->authorId);
    }

    public function getArticle(): Article
    {
        return Article::getById($this->articleId);
    }

    public function getArticleId(): int {
        return $this->articleId;
    }

    public function getText(): string
    {
        return $this->text;
    }


    public function setText(string $text): void
    {
        $this->text = $text;
    }

    public function setAuthor(int $id): void
    {
        $this->authorId = $id;
    }

    public function setArticle(int $id): void
    {
        $this->articleId = $id;
    }

    public function isAuthor(User $user): bool
    {
        return $this->authorId == $user->getId();
    }

    public static function createComment(array $fields, int $articleId, int $userId): Comment
    {
        if (empty($fields['text'])) {
            throw new InvalidArgumentException('Комментарий не может быть пустым');
        }

        $comment = new Comment();

        $comment->setAuthor($userId);
        $comment->setArticle($articleId);
        $comment->setText($fields['text']);

        $comment->save();

        return $comment;
    }

    public function editComment(array $fields): Comment {
        if (empty($fields['text'])) {
            throw new InvalidArgumentException('Комментарий не может быть пустым');
        }

        $this->setText($fields['text']);
        $this->save();

        return $this;

    }


}