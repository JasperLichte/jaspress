<?php

namespace settings\validator;

class NumberValidator extends Validator
{

    public function validate(string $value): bool
    {
        return (is_numeric((float)$value));
    }

}
