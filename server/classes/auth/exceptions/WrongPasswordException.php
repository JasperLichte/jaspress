<?php

namespace auth\exceptions;


use Exception;

class WrongPasswordException extends Exception
{

    public function __construct()
    {
        parent::__construct('Wrong password');
    }

}
