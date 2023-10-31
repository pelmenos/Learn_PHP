<?php include __DIR__ . '/../header.php'; ?>
    <a href="/OOP/lvl2/www/admin/comments"><h3>Последние комметарии</h3></a>
    <hr>
<?php foreach ($articles as $article): ?>
    <a href="/OOP/lvl2/www/articles/<?= $article->getId()?>"><h1><?= $article->getName() ?></h1></a>
    <p><?= $article->getText() ?></p>
    <a href="/OOP/lvl2/www/admin/articles/edit/<?= $article->getId()?>">Редактровать</a>
    <hr>
<?php endforeach; ?>

<?php include __DIR__ . '/../footer.php'; ?>