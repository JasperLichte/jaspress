<?php

namespace permissions;


use auth\models\User;

class AlwaysAllowedPermission extends Permission
{

    public function check(?User $user): bool
    {
        return true;
    }

}
