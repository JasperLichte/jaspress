<?php

namespace render\components\pages\admin\page;

use render\components\pages\admin\AdminPage;
use request\Url;

class NewPagePage extends AdminPage
{

    protected function render(): string
    {
        parent::render();

        return $this->renderController->render('@pages/admin/page/new');
    }

    public static function endPoint(): Url
    {
        return Url::to('/admin/page/new.php');
    }

}
