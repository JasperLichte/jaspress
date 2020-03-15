<?php

namespace render\components\pages\admin\file;

use render\components\pages\admin\AdminPage;
use request\Url;

class FileUploadPage extends AdminPage
{

    public static function endPoint(): Url
    {
        return Url::to('/admin/file/upload.php');
    }

    public function title(): string
    {
        return $this->buildTitle('Upload file');
    }

    protected function render(): string
    {
        parent::render();

        return $this->renderController->render('@pages/admin/file/upload');
    }

}
