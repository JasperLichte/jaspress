<?php

namespace permissions;

use auth\models\User;

abstract class Permission
{

    abstract public function check(?User $user): bool;

}
