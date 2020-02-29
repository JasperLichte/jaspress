<?php

namespace permissions;

use auth\models\User;

class AdminPermission extends Permission
{

    public function check(?User $user): bool
    {
        return ($user != null && $user->isAdmin());
    }

}
