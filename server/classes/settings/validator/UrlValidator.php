<?php

namespace settings\validator;

class UrlValidator extends Validator
{

    public function validate(string $value): bool
    {
        return filter_var($value, FILTER_VALIDATE_URL);
    }

}
