<?php

namespace settings;


use database\Connection;
use settings\types\options\OptionsSetting;

abstract class BaseSetting
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

    public static function save(Connection $db, string $dbKey, string $value)
    {
        $statement = $db()->prepare('REPLACE INTO settings (id, value) VALUES(?, ?)');
        $statement->execute([$dbKey, $value]);
    }

    public function isOptionSetting(): bool
    {
        return ($this instanceof OptionsSetting);
    }

    public function __toString()
    {
        return $this->getValue();
    }

    abstract public static function dbKey(): string;

    abstract public function description(): string;

}
