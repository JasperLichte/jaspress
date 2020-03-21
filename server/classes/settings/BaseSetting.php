<?php

namespace settings;

use database\Connection;
use settings\categories\SettingsCategory;
use settings\settings\ui\colors\ColorSetting;
use settings\strategies\DefaultStrategy;
use settings\strategies\SavingStrategy;
use settings\types\options\BooleanSetting;
use settings\types\options\OptionsSetting;
use settings\validator\Validator;
use util\interfaces\Jsonable;

abstract class BaseSetting extends Jsonable
{

    /** @var null|string */
    protected $value = null;

    /** @var SavingStrategy */
    protected static $savingStrategy = null;

    public function __construct()
    {
        self::$savingStrategy = new DefaultStrategy();
    }

    public function setValue(string $value): void
    {
        $this->value = $value;
    }

    public function getValue(): string
    {
        $value = $this->value !== null ? $this->value : $this->getDefaultValue();
        return ($this->validate($value) ? $value : $this->getDefaultValue());
    }

    public function save(Connection $db, string $dbKey, string $value)
    {
        self::$savingStrategy->setDbKey($dbKey);
        self::$savingStrategy->setValue($value);

        self::$savingStrategy->save($db);
    }

    public static function delete(Connection $db, string $dbKey)
    {
        self::$savingStrategy->setDbKey($dbKey);

        self::$savingStrategy->delete($db);
    }

    public function validate(string $value): bool
    {
        return $this->getValidator()->validate($value);
    }

    public function __toString()
    {
        return $this->getValue();
    }

    abstract public function getDefaultValue(): string;

    abstract public function getCategory(): SettingsCategory;

    abstract public static function dbKey(): string;

    abstract public function description(): string;

    abstract public function getValidator(): Validator;

    public function isOptionSetting(): bool
    {
        return ($this instanceof OptionsSetting);
    }

    public function isColorSetting(): bool
    {
        return ($this instanceof ColorSetting);
    }

    public function isBooleanSetting(): bool
    {
        return ($this instanceof BooleanSetting);
    }

    public function isNumberSetting(): bool
    {
        return false;
    }

}
