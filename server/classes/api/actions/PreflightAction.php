<?php

namespace api\actions;

use api\ApiResponse;
use permissions\AlwaysAllowedPermission;
use permissions\Permission;
use settings\Settings;

class PreflightAction extends Action
{

    public function permission(): Permission
    {
        return new AlwaysAllowedPermission();
    }

    public function run(): ApiResponse
    {
        $user = $this->req->getUser();
        $settings = Settings::getInstance();

        return $this->res->withData([
            'user' => $user,
            'settings' => $settings->asIndexedArray(),
        ]);
    }

}
