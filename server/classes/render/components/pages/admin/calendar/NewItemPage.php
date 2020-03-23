<?php

namespace render\components\pages\admin\calendar;

use render\components\pages\admin\AdminPage;
use request\Url;

class NewItemPage extends AdminPage
{

    public static function endPoint(): Url
    {
        return Url::to('/admin/calendar/new.php');
    }


    protected function render(): string
    {
        parent::render();

        return $this->renderController->render(
            '@pages/admin/calendar/new'
        );
    }

    public function title(): string
    {
        return $this->buildTitle('New calendar item');
    }

}
