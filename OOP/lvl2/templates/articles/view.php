<?php include __DIR__ . '/../header.php'; ?>
    <h1><?= $article->getName() ?></h1>
    <p><?= $article->getText() ?></p>
    <p><?= $article->getAuthor()->getNickname()?></p>
    <p><?= $article->getCreatedAt()?></p>

    <?php if (!empty($user)): ?>
        <?php if ($user->isAdmin()): ?>
            <a href="/OOP/lvl2/www/articles/<?= $article->getId()?>/edit">Редактировать</a>
        <?php endif;?>
    <?php endif;?>
    <hr>

    <?php include __DIR__ . '/../comments/view.php'; ?>

<?php include __DIR__ . '/../footer.php'; ?>