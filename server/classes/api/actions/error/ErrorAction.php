<?php

namespace api\actions\error;

use api\actions\Action;
use api\ApiResponse;
use permissions\AlwaysAllowedPermission;
use permissions\Permission;

class ErrorAction
{

    /** @var \Exception */
    private $exception;


    public function __construct(\Exception $exception)
    {
        $this->exception = $exception;
    }

    public function run(): ApiResponse
    {
        $res = new ApiResponse();
        return $res->exception($this->exception)->setSuccess(true)->asJson();
    }

}
