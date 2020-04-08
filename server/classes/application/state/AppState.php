<?php

namespace application\state;


use application\menu\Menu;
use auth\models\User;
use database\Connection;
use request\License;

class AppState
{

    /** @var Menu */
    private $menu;

    /** @var Ui */
    private $ui;

    /** @var User */
    private $user = null;

    /** @var License  */
    private $license = null;

    public function __construct(Connection $db)
    {
        $this->menu = new Menu();
        $this->ui = new Ui($db);
        $this->user = User::loadFromSession($db);
    }

    public function getMenu(): Menu
    {
        return $this->menu;
    }

    public function getUser(): ?User
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

    public function setLicense(License $license)
    {
        $this->license = $license;
        return $this;
    }

    public function getLicense(): License
    {
        return $this->license;
    }

}
