<?php

namespace MyProject\Models\Articles;
use MyProject\Exceptions\InvalidArgumentException;
use MyProject\Models\ActiveRecordEntity;
use MyProject\Models\Users\User;

class Article extends ActiveRecordEntity
{
    protected string $name;
    protected string $text;
    protected int $authorId;
    protected ?string $createdAt = null;


    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getText(): string
    {
        return $this->text;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function setText(string $text): void
    {
        $this->text = $text;
    }

    public function setAuthor(int $id): void
    {
        $this->authorId = $id;
    }

    public function getCreatedAt(): string
    {
        return $this->createdAt;
    }

    public function setCreatedAt(string $datetime): void
    {
        $this->createdAt = $datetime;
    }

    public function getAuthor(): User
    {
        return User::getById($this->authorId);
    }

    protected static function getTableName(): string
    {
        return 'articles';
    }

    public static function createFromArray(array $fields, User $author): Article
    {
        if (empty($fields['name'])) {
            throw new InvalidArgumentException('Не передано название статьи');
        }

        if (empty($fields['text'])) {
            throw new InvalidArgumentException('Не передан текст статьи');
        }

        $article = new Article();

        $article->setAuthor($author->getId());
        $article->setName($fields['name']);
        $article->setText($fields['text']);

        $article->save();

        return $article;
    }

    public function editFromArray(array $fields): Article
    {
        if (empty($fields['name'])) {
            throw new InvalidArgumentException('Не передано название статьи');
        }

        if (empty($fields['text'])) {
            throw new InvalidArgumentException('Не передан текст статьи');
        }

        $this->setName($fields['name']);
        $this->setText($fields['text']);

        $this->save();

        return $this;
    }
}