<h4>Оставьте комметарий</h4>
<?php if(!empty($error)): ?>
    <div style="color: red;"><?= $error ?></div>
<?php endif; ?>
<form action="/OOP/lvl2/www/articles/<?= $article->getId()?>/comments" method="post">

    <label for="text">Текст комментария</label><br>
    <textarea name="text" id="text" rows="10" cols="80"></textarea><br>
    <br>
    <input type="submit" value="Оставить">
</form>