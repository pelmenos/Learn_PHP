<?php include __DIR__ . '/../header.php'; ?>
<h1>Создание новой статьи</h1>
<?php if(!empty($error)): ?>
    <div style="color: red;"><?= $error ?></div>
<?php endif; ?>
<form action=<?= "/OOP/lvl2/www/articles/{$article->getId()}/edit" ?> method="post">
    <label for="name">Название статьи</label><br>
    <input type="text" name="name" id="name" value="<?= $article->getName() ?? '' ?>" size="50"><br>
    <br>
    <label for="text">Текст статьи</label><br>
    <textarea name="text" id="text" rows="10" cols="80"><?= $article->getText() ?? '' ?></textarea><br>
    <br>
    <input type="submit" value="Изменить">
</form>
<?php include __DIR__ . '/../footer.php'; ?>
