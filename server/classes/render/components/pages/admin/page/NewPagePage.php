<?php

namespace render\components\pages\admin\page;

use request\Url;

class NewPagePage extends PageAdminPage
{

    protected function render(): string
    {
        parent::render();

        return $this->renderController->render(
            '@pages/admin/page/new',
            ['slug' => $this->slug]
        );
    }

    public static function endPoint(): Url
    {
        return Url::to('/admin/page/new.php');
    }

    public function title(): string
    {
        return $this->buildTitle('New page');
    }

}
