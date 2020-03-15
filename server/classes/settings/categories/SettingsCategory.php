<?php

namespace settings\categories;


abstract class SettingsCategory
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

    abstract public function title(): string;

}
