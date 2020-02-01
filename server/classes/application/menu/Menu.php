<?php
namespace application\menu;


class Menu
{

    /**
     * @var MenuEntry[]
     */
    private $entries = [];

    public function __construct()
    {
        $this->entries = self::loadEntries();
    }

    /**
     * @return MenuEntry[]
     */
    public function getEntries(): array
    {
        return $this->entries;
    }

    /**
     * @return MenuEntry[]
     */
    private static function loadEntries(): array
    {
        $entries = [];

        // TODO load menu entries from db

        return $entries;
    }

}
