<?php

namespace api\actions\config;

use api\actions\Action;
use api\ApiResponse;
use config\Config;
use permissions\AlwaysAllowedPermission;
use permissions\Permission;
use request\Url;

class GetConfigAction extends Action
{

    public function run(): ApiResponse
    {
        $res = new ApiResponse();
        return $res->withData([
            'base_url' => Config::ROOT_URL(),
            'base_api_url' => Url::api('')->getPath(),
        ]);
    }

    public function permission(): Permission
    {
        return new AlwaysAllowedPermission();
    }

    protected function licenseNeeded(): bool
    {
        return false;
    }
}
