<?php

namespace settings\validator;

class NumberValidator extends Validator
{

    /** @var int|null */
    private $min = null;

    /** @var int|null */
    private $max = null;

    public function __construct($min = null, $max = null)
    {
        $this->min = $min;
        $this->max = $max;
    }

    public function validate(string $value): bool
    {
        $numValue = (float)$value;
        if (!is_numeric($numValue)) {
            return false;
        }

        if ($this->min !== null && $numValue < $this->min) {
            return false;
        }

        if ($this->max !== null && $numValue > $this->max) {
            return false;
        }

        return true;
    }

}
