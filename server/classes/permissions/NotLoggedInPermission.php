<?php

namespace permissions;

use auth\models\User;

class NotLoggedInPermission extends Permission
{

    public function check(?User $user): bool
    {
        return ($user === null);
    }

}
