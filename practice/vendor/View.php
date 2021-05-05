<?php


class View
{
    //public $template_view; // здесь можно указать общий вид по умолчанию.

    static function generate($content_view, $title = APP_CONF['title'], $data = null, $template_view = 'layout/layout.php')
    {
        if (trim($title) == null) $title = APP_CONF['title'];
        if(is_array($data)) {
            // преобразуем элементы массива в переменные
            extract($data);
        }
        include 'views/'.$template_view;
    }
}