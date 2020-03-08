<?php

namespace settings;


use database\Connection;
use settings\settings\ui\colors\ColorSetting;
use settings\types\options\OptionsSetting;
use util\interfaces\Jsonable;

abstract class BaseSetting extends Jsonable
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

    public static function delete(Connection $db, string $dbKey)
    {
        $db()->prepare('DELETE FROM settings WHERE id = ?')->execute([$dbKey]);
    }

    public function __toString()
    {
        return $this->getValue();
    }

    abstract public static function dbKey(): string;

    abstract public function description(): string;

    public function isOptionSetting(): bool
    {
        return ($this instanceof OptionsSetting);
    }

    public function isColorSetting(): bool
    {
        return ($this instanceof ColorSetting);
    }

}
