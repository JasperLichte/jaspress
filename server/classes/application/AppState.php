<?php

namespace application;


use application\menu\Menu;
use auth\models\User;

class AppState
{

    /** @var Menu */
    private $menu;

    /** @var User */
    private $user;

    public function __construct()
    {
        $this->menu = new Menu();
        $this->user = User::loadFromSession();
    }

    public function getMenu(): Menu
    {
        return $this->menu;
    }

    public function getUser(): User
    {
        return $this->user;
    }

}
