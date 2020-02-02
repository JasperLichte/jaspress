<?php

namespace application\state;


use application\menu\Menu;
use auth\models\User;

class AppState
{

    /** @var Menu */
    private $menu;

    /** @var Ui */
    private $ui;

    /** @var User */
    private $user = null;

    public function __construct()
    {
        $this->menu = new Menu();
        $this->ui = new Ui();
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

    public function getUi(): Ui
    {
        return $this->ui;
    }

    public function setUi(Ui $ui): AppState
    {
        $this->ui = $ui;

        return $this;
    }

}
