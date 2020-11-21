<?php namespace Kloos\Chatwoot\Classes;

use Event;

class PageBeforeDisplay
{
    public function subscribe()
    {
        Event::listen('backend.page.beforeDisplay', function ($controller) {
            $controller->addJs('/js/chatwindow.js', 'Kloos.Chatwoot');
            $controller->addCss('/plugins/kloos/chatwoot/assets/css/chatwindow.css', 'Kloos.Chatwoot');
        });
    }
}