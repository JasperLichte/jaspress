<?php

namespace api\actions;

use api\ApiResponse;
use application\AppContainer;
use permissions\Permission;
use request\Url;

abstract class Action extends AppContainer
{

    /** @var ApiResponse */
    protected $res;

    public function __construct()
    {
        parent::__construct();
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

}
