<?php


class controller_404 extends Controller
{
    public function action_index()
    {
        $this->render('404/index.php', '404');
    }
}