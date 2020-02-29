<?php

namespace api\actions;

use api\ApiResponse;
use application\App;
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
        $app = App::getInstance();
        $this->req = $app->getRequest();
        $this->db = $app->getDb();
        $this->res = new ApiResponse();
    }

    public function run(): ApiResponse
    {
        return $this->res;
    }

    public function __invoke()
    {
        return $this->run();
    }

}
