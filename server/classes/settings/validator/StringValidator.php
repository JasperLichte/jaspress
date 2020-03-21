<?php

namespace settings\validator;

class StringValidator extends Validator
{

    public function validate(string $value): bool
    {
        return is_string($value);
    }
}
