<?php

namespace settings\validator;

abstract class Validator
{

    abstract public function validate(string $value): bool;

}
