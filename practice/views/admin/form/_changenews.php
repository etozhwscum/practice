<form action="/administration/changeNews?id=<?= $_GET['id'] ?>" method="post" style="display: flex; flex-flow: column;">
    <label style="margin-left: 0;"> Заголовок <br>
        <input type="text" name="title" value="<?= $data['model']['title']?>">
    </label>
    <label style="margin-left: 0;"> Описание <br>
        <textarea name="text" cols="30" style="margin-left: 0;"><?= $data['model']['text']?></textarea>
    </label>
    <input type="submit" name="submit" style="margin-left: 0;">
</form>