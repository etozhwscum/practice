<?php

/** @noinspection PhpExpressionResultUnusedInspection */

class Controller_Comments extends Controller
{

    public function action_index()
    {
        $this->redirect('/site');
    }

    public function action_create()
    {
        $model = new Comments();

        $user = (new Model)->getTable('news');
        if (isset($_POST['text'], $_POST['news'])) {
            $model->id_news = $_POST['news'];
            $model->text = $_POST['text'];
            $model->id_user = $_SESSION['user']['id'];

            return ($result = $model->save())['status'] == true ? $this->redirect('/site/news') : var_dump($result);
        }
        return $this->render('registration/index.php', 'Регистрация');
    }
}
