<?php

namespace render\components\pages\admin;

use request\Url;

class DashboardPage extends AdminPage
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
