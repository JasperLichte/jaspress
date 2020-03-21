<?php

namespace settings\validator;

class BooleanValidator extends Validator
{

    public function validate(string $value): bool
    {
        return in_array($value, ['yes', 'no']);
    }

}
