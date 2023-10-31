<?php include __DIR__ . '/../header.php'; ?>
    <a href="/OOP/lvl2/www/admin/articles"><h3>Последние статьи</h3></a>
    <hr>
<?php foreach ($comments as $comment): ?>
    <p><?= $comment->getAuthor()->getNickname()?></p>
    <a href="/OOP/lvl2/www/articles/<?= $comment->getArticleId() . '#' . $comment->getId()?>"><p><?= $comment->getText() ?></p></a>
    <a href="/OOP/lvl2/www/admin/comments/edit/<?= $comment->getId()?>">Редактровать</a>
    <hr>
<?php endforeach; ?>

<?php include __DIR__ . '/../footer.php'; ?>