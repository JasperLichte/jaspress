<?php

namespace settings;


class BaseSetting
{

    /** @var null|string */
    protected $value = null;

    /** @var string */
    protected $defaultValue = '';

    /** @var string */
    public const DB_KEY = '';


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

}
