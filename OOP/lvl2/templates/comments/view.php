<?php if (!empty($user)): ?>
    <?php include __DIR__ . '/../comments/add.php'; ?>
<?php else: ?>
    <h4>Зарегестрируйтесь чтобы оставлять комментарии</h4>
<?php endif;?>

<hr>

<h3>Коментарии</h3>
<?php if (empty($comments)):?>
    <p>Комментариев пока нет</p>
<?php endif;?>
<?php foreach ($comments as $comment): ?>
    <h5 id=<?= $comment->getId()?>>Автор: <?= $comment->getAuthor()->getNickname()?></h5>
    <p><?= $comment->getText() ?></p>
    <?php if (!empty($user) && ($comment->isAuthor($user) || $user->isAdmin())): ?>
        <a href=<?= "/OOP/lvl2/www/comments/" . $comment->getId() . '/edit'?>>Изменить</a>
    <?php endif;?>
    <hr>
<?php endforeach; ?>