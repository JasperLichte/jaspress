<?php

namespace api\actions;

use api\ApiResponse;
use application\App;
use database\Connection;
use permissions\Permission;
use request\Request;
use request\Url;

abstract class Action
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

    public function __invoke(): ApiResponse
    {
        if (!$this->checkPermission($this->permission())) {
            $this->req->redirectTo(Url::api('/auth/logout.php'));
            return $this->res;
        }

        return $this->run();
    }

    abstract public function run(): ApiResponse;

    abstract public function permission(): Permission;

    private function checkPermission(Permission $permission): bool
    {
        return $permission->check($this->req->getUser());
    }

}
