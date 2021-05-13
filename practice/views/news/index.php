<div class="grid">
    <h1>News</h1><br>
    <?php foreach ($data as $row) : ?>
        <div class="grid-row">
            <div class="news">
                <h3 class="news__title"><?= $row['title'] ?></h3>
                <p class="news__description"><?= $row['text'] ?></p>
                <?php if (isset($_SESSION['user'])) : ?>
                    <form action="/comments/create" method="POST" class="news-form">
                        <input type="text" name="text" placeholder="Введите комментарий" class="news-form__input">
                        <input type="hidden" name="news" value="<?= $row['id'] ?>">
                        <button type="submit" class="news-form__submit">Отправить</button>
                    </form>
                <?php endif; ?>
            </div>
        </div>
    <?php endforeach; ?>
</div>