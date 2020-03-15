<?php

namespace api\actions\admin\file;


use api\actions\admin\AdminAction;
use api\ApiResponse;
use util\models\File;

class UploadFileAction extends AdminAction
{

    /** @var File */
    private $file = null;

    public function __construct()
    {
        parent::__construct();

        if ($this->req->issetFile('file')) {
            $this->file = $this->req->getFile('file');
        }
    }

    public function run(): ApiResponse
    {
        if ($this->file == null) {
            return $this->req->reloadWith(
                $this->res->setErrorMessage('No file provided')
            );
        }

        $this->file->save($this->db);

        if (empty($this->file->getId())) {
            return $this->req->reloadWith(
                $this->res->setErrorMessage('Image could not be stored!')
            );
        }

        return $this->req->redirectWith(
            $this->res->setSuccessMessage('File successfully uploaded'),
            $this->file->endpoint()
        );
    }

}
