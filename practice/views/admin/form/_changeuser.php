<form action="/administration/changeUser?id=<?=$_GET['id']?>" method="post">
    <input type="text" name="login" value="<?= $data['model']['login'] ?>" required>
    <input type="password" name="password" value="<?= $data['model']['password'] ?>" required >
    <input type="submit" name="submit">
</form>