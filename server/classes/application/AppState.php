<?php

namespace application;


use application\menu\Menu;

class AppState
{

    /**
     * @var Menu
     */
    private $menu;

    public function getMenu(): Menu
    {
        return $this->menu;
    }

}
