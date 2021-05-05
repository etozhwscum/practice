<div class="administration-overall-wrapper">
    <?php foreach ($data as $table): ?>
            <?php if ($table['name'] == 'user'): ?>
            <table class="administration-table">
                <caption>Таблица "<?= $table['name'] ?>" </caption>
                <caption><a href="/administration/addUser" class="add">Добавить</a></caption>
                <tr>
                    <td>Логин</td>
                    <td>Пароль</td>
                    <td>Роль</td>
                </tr>
        <?php foreach ($table['model'] as $row): ?>
                <tr>
                    <td><?= $row['login'] ?></td>
                    <td><?= $row['password'] ?></td>
                    <td><?= $data[0]['role']($row['id_role'])['title'] ?></td>
                    <?php if($_SESSION['user']['login'] !== $row['login']): ?>
                    <td>
                        <a class="change-link" href="/administration/changeUser?id=<?=$row['id']?>">Изменить</a>
                    </td>
                    <td>
                        <form action="/administration/delete" method="post">
                            <input type="hidden" name="user" value="<?= $row['id'] ?>">
                            <input type="submit" name="btn" class="delete" value="">
                        </form>
                    </td>
                    <?php endif;?>
                </tr>
        <?php endforeach; ?>
            </table>
        <?php else: ?>
            <table class="administration-table">
                <caption>Таблица "<?= $table['name'] ?>"</caption>
                <caption><a href="/administration/addNews" class="add">Добавить</a></caption>
                <tr>
                    <td>Заголовок</td>
                    <td>Текст</td>
                </tr>
                <?php foreach ($table['model'] as $row): ?>
                    <tr>
                        <td><?= $row['title'] ?></td>
                        <td><?= $row['text'] ?></td>
                        <td>
                            <a class="change-link" href="/administration/changeNews?id=<?=$row['id']?>">Изменить</a>
                        </td>
                        <td>
                        <form action="/administration/delete" method="post">
                            <input type="hidden" name="news" value="<?= $row['id'] ?>">
                            <input type="submit" name="btn" class="delete" value="">
                        </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php endif; ?>
    <?php endforeach; ?>
</div>