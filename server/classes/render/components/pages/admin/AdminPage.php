<?php

namespace render\components\pages\admin;

use permissions\AdminPermission;
use permissions\Permission;
use render\components\PageComponent;

abstract class AdminPage extends PageComponent
{

    public function permission(): Permission
    {
        return new AdminPermission();
    }

}
