<?php

namespace util\exceptions;


class LogicException extends \Exception
{

    public function __construct(string $message)
    {
        parent::__construct($message);
    }

}
