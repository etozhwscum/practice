<?php

use models\Main;

class Controller_Site extends Controller
{
    public function action_index()
    {
        $model = new Main();
        $this->render('main/index.php', 'Главная', $model->getModel());
    }

    public function action_contact()
    {
        $this->render('contact/index.php', 'Контакт');
    }

    public function action_service()
    {
        $this->render('service/index.php', 'Услуги');
    }

    public function action_portfolio()
    {
        $this->render('portfolio/index.php', 'Портфолио', (new \models\Portfolio())->getModel());
    }

    public function action_news()
    {
        $this->render('news/index.php', 'Новости', (new News())->getModel());
    }
}