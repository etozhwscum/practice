<?php /** @noinspection PhpExpressionResultUnusedInspection */

class Controller_Sign extends Controller {
    public function action_index()
    {
        $this->redirect('/site');
    }

    public function __construct()
    {
        if(isset($_SESSION['user'])) $this->redirect('/404');
    }

    public function action_registration()
    {
        $model = new User;
        if (isset($_POST['submit'], $_POST['login'], $_POST['password'])) {
            $model->login = $_POST['login'];
            $model->password = $_POST['password'];
            if(($status = $model->uniqueLogin())['status']) {
                return ($result = $model->save())['status'] == true ? $this->redirect('/sign/authentication') : $result;
            } else {
                return $this->render('registration/index.php', 'Регистрация', $status['error']);
            }
        }
        return $this->render('registration/index.php', 'Регистрация');

    }

    public function action_authentication()
    {
        $model = new User;
        if (isset($_POST['submit'], $_POST['login'], $_POST['password'])) {
            $model->login = $_POST['login'];
            $model->password = $_POST['password'];
            if(($status = $model->authentication())['status']) {
                $_SESSION['user']['login'] = $model->login;
                $_SESSION['user']['password'] = $model->password;
                $_SESSION['user']['role'] = $model->role;
                $this->redirect('/site');
            } else {
                return $this->render('authentication/index.php', 'Аутентификация', $status['error']);
            }
        }
        return $this->render('authentication/index.php', 'Аутентификация');
    }


    public function action_logout()
    {
        session_destroy();
        $this->redirect('/site');
    }
}