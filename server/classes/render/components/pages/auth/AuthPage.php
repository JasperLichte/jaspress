<?php

namespace render\components\pages\auth;


use permissions\NotLoggedInPermission;
use permissions\Permission;
use render\components\PageComponent;

abstract class AuthPage extends PageComponent
{

    public function permission(): Permission
    {
        return new NotLoggedInPermission();
    }

}
