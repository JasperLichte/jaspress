<?php

namespace util\exceptions;

use Exception;

class InvalidArgumentsException extends Exception
{

    public function __construct(string $message)
    {
        parent::__construct($message);
    }

}
