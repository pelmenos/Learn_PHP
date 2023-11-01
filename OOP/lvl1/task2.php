<?php

class Cat
{
    private string $name;
    private string $color;

    public function __construct(string $name, string $color)
    {
        $this->name = $name;
        $this->color = $color;

    }

    public function sayHello()
    {
        echo 'Привет! Меня зовут ' . $this->name . '. ';
        echo 'Мой цвет ' . $this->color . '.' . '<br>';
    }
    public function getName(): string
    {
        return $this->name;
    }
    public function getColor(): string
    {
        return $this->color;
    }
    public function setName(string $cat_name): void
    {
        $this->name = $cat_name;
    }
    public function setColor(string $color): void
    {
        $this->color = $color;
    }
}

$cat1 = new Cat('Снежок', 'Белый');
$cat1->sayHello();

$cat2 = new Cat('Барсик', 'Рыжий');
$cat2->sayHello();
