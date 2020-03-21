<?php

namespace settings\validator;

class ColorValidator extends Validator
{

    public function validate(string $value): bool
    {
        return ctype_xdigit(str_replace('#', '', $value));
    }

}
