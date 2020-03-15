<?php

namespace api\actions\file;


use api\actions\Action;
use api\ApiResponse;
use permissions\AlwaysAllowedPermission;
use permissions\Permission;
use util\models\File;

class ShowFileAction extends Action
{

    /** @var int|null */
    private $id = null;

    public function __construct()
    {
        parent::__construct();

        if ($this->req->issetGet('i')) {
            $this->id = (int)$this->req->getGet('i');
        }
    }

    public function run(): ApiResponse
    {
        if ($this->id == null) {
            return $this->res;
        }

        $file = File::load($this->db, $this->id);
        if ($file == null) {
            return $this->res;
        }

        $this->res->asFile($file);

        return $this->res;
    }

    public function permission(): Permission
    {
        return new AlwaysAllowedPermission();
    }
}
