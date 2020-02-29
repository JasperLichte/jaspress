<?php

namespace api\actions\admin;

use api\actions\Action;
use permissions\AdminPermission;
use permissions\Permission;

abstract class AdminAction extends Action
{

    public function permission(): Permission
    {
        return new AdminPermission();
    }

}
