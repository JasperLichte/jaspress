<?php

namespace api;


use util\interfaces\Enum;

abstract class ResponseFormat extends Enum
{

    public const JSON = 'application/json';
    public const HTML = 'text/html';
    public const FILE = 'FILE';

}
