<?php


class Controller
{
    public $title;
    public function render(string $content_view, $title = APP_CONF['title'],  $data = null, $template_view = 'layout.php')
    {
        return View::generate($content_view, $title,  $data,  $template_view = 'layout/layout.php');
    }

    public function redirect(string $url)
    {
        header("Location: {$url}");
    }

    public function request()
    {
        $get = 1;
        $post =1;
    }
}