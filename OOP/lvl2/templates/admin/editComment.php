<?php include __DIR__ . '/../header.php'; ?>
    <h1>Изменение комментария</h1>
<?php if(!empty($error)): ?>
    <div style="color: red;"><?= $error ?></div>
<?php endif; ?>
    <form action="/OOP/lvl2/www/admin/comments/edit/<?= $comment->getId()?>" method="post">

        <label for="text">Текст комментария</label><br>
        <textarea name="text" id="text" rows="10" cols="80"><?= $comment->getText()?></textarea><br>
        <br>
        <input type="submit" value="Изменить">
    </form>
<?php include __DIR__ . '/../footer.php'; ?>