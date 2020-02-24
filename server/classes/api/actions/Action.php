<?php

namespace api\actions;

use api\ApiResponse;
use database\Connection;
use request\Request;

class Action
{

    /** @var Request */
    protected $req;

    /** @var ApiResponse */
    protected $res;

    /** @var Connection */
    protected $db;

    public function __construct()
    {
        $this->req = new Request();
        $this->res = new ApiResponse();

        $this->db = Connection::getInstance();
    }

    public function run(): ApiResponse
    {
        return $this->res;
    }

}
