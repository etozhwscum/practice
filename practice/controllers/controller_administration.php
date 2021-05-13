<?php


class controller_administration extends Controller
{
    public function __construct()
    {
        if ($_SESSION['user']['role'] !== 1) $this->redirect('/404');
    }

    public function action_index()
    {
        $this->render(
            'admin/index.php',
            'Администрация',
            [
                [
                    'name' => 'user', 'model' => (new Model)->getTable('user'),
                    'role' =>  function ($id) {
                        return (new User)->getRole($id);
                    }
                ],
                ['name' => 'news', 'model' => (new Model)->getTable('news')],
                ['name' => 'comments', 'model' => (new Model)->getTable('comments')],
            ]
        );
    }

    public function action_delete()
    {
        if (isset($_POST['news'])) (new News)->delete($_POST['news']);
        if (isset($_POST['user'])) (new User)->delete($_POST['user']);
        if (isset($_POST['comments'])) (new Comments)->delete($_POST['comments']);
        $this->redirect('/administration');
    }

    public function action_addUser()
    {
        $model = new User();
        if (isset($_POST['submit'], $_POST['login'], $_POST['password'])) {
            $model->login = $_POST['login'];
            $model->password = $_POST['password'];
            $model->role = 2;
            if ($model->save()['status']) return $this->redirect('/administration');
        }
        return $this->render('admin/form/_adduser.php', 'Добавить Пользователя');
    }
    public function action_changeUser()
    {
        $model = new User;
        if (isset($_POST['submit'], $_POST['login'], $_POST['password'])) {
            $model->login = $_POST['login'];
            $model->password = $_POST['password'];
            $model->id = $model->getUser($_GET['id'])['id'];
            if ($model->update()['status']) return $this->redirect('/administration');
        }
        return $this->render('admin/form/_changeuser.php', 'Изменить Пользователя', ['model' => $model->getUser($_GET['id'])]);
    }

    public function action_addNews()
    {
        $model = new News();
        if (isset($_POST['submit'], $_POST['title'], $_POST['text'])) {
            $model->title = $_POST['title'];
            $model->text = $_POST['text'];
            if ($model->save()['status']) return $this->redirect('/administration');
            var_dump($model->save());
        }
        return $this->render('admin/form/_addnews.php', 'Добавить Пользователя');
    }
    public function action_changeNews()
    {
        $model = new News;
        if (isset($_POST['submit'], $_POST['title'], $_POST['text'])) {
            $model->title = $_POST['title'];
            $model->text = $_POST['text'];
            $model->id = $model->getNews($_GET['id'])['id'];
            if ($model->update()['status']) return $this->redirect('/administration');
        }
        return $this->render('admin/form/_changenews.php', 'Изменить Новость', ['model' => $model->getNews($_GET['id'])]);
    }
}
