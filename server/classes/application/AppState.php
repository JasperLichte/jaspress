<?php

namespace application;


use application\menu\Menu;

class AppState
{

    /**
     * @var Menu
     */
    private $menu;

    public function __construct()
    {
        $this->menu = new Menu();
    }

    public function getMenu(): Menu
    {
        return $this->menu;
    }

}
