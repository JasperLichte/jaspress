<?php

namespace api\actions\auth;

use api\actions\Action;
use permissions\NotLoggedInPermission;
use permissions\Permission;

abstract class AuthAction extends Action
{

    public function permission(): Permission
    {
        return new NotLoggedInPermission();
    }

}
