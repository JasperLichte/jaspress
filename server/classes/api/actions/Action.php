<?php

namespace api\actions;

use api\ApiResponse;
use request\Request;

class Action
{

    /** @var Request */
    protected $req;

    /** @var ApiResponse */
    protected $res;

    public function __construct()
    {
        $this->req = new Request();
        $this->res = new ApiResponse();
    }

    public function run(): ApiResponse
    {
        return $this->res;
    }

}
