<?php
namespace application\menu;


class Menu
{

    /**
     * @var MenuEntry
     */
    private $activeEntry;

    public function getActiveEntry(): MenuEntry
    {
        return $this->activeEntry;
    }

}
