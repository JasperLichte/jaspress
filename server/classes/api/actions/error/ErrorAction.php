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
    /**
     * @var int
     */
    private $status;


    public function __construct(\Exception $exception, int $status = 400)
    {
        $this->exception = $exception;
        $this->status = $status;
    }

    public function run(): ApiResponse
    {
        $res = new ApiResponse();
        return $res->exception($this->exception)->setSuccess(true)->asJson()->status($this->status);
    }

}
