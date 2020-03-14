<?php

namespace settings\categories;


class SettingsCategory
{

    private $id = '';

    public function __construct($id)
    {
        $this->id = $id;
    }

    public function getId(): string
    {
        return $this->id;
    }

}
