<?php

namespace util\exceptions;

class InvalidLicenseException extends \Exception
{

    public function __construct()
    {
        parent::__construct('Invalid license!');
    }

}
