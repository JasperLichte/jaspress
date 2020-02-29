<?php

namespace settings;


use database\Connection;
use settings\types\options\OptionsSetting;

class BaseSetting
{

    /** @var null|string */
    protected $value = null;

    /** @var string */
    protected $defaultValue = '';


    public function setValue(string $value): void
    {
        $this->value = $value;
    }

    public function getValue(): string
    {
        return $this->value !== null ? $this->value : $this->defaultValue;
    }

    public function getDefaultValue(): string
    {
        return $this->defaultValue;
    }

    public static function dbKey(): string
    {
        return '';
    }

    public static function save(string $dbKey, string $value)
    {
        $db = Connection::getInstance();
        $statement = $db()->prepare('REPLACE INTO settings (id, value) VALUES(?, ?)');
        $statement->execute([$dbKey, $value]);
    }

    public function isOptionSetting(): bool
    {
        return ($this instanceof OptionsSetting);
    }

}
