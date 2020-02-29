<?php

namespace render\components\pages\admin;


use render\components\PageComponent;
use request\Url;

class DashboardPage extends PageComponent
{

    public function render(): string
    {
        parent::render();

        return $this->renderController->render('@pages/admin/dashboard');
    }

    public function title(): string
    {
        return $this->buildTitle('Dashboard');
    }

    public static function endPoint(): Url
    {
        return Url::to('/admin');
    }

}
