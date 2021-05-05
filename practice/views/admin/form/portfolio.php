<h3><?= isset($_GET['id']) ? 'Изменить' : 'Добавить' ?> строку в Портфолио</h3>
<form action="/administration/<?= isset($_GET['id']) ? 'update?id='.$_GET['id'].'&' : 'add?' ?>table=portfolio&apply" method="post">
    <input type="text" name="title" placeholder="title" value="<?= isset($model) ? $model['title'] : null ?>">
    <input type="text" name="text" placeholder="text"  value="<?= isset($model) ? $model['text'] : null ?>" >
    <input type="submit" name="submit" value="Отправить">
</form>