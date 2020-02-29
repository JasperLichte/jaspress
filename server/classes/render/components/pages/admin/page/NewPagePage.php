<?php

namespace render\components\pages\admin\page;


use render\components\PageComponent;

class NewPagePage extends PageComponent
{

    protected function render(): string
    {
        parent::render();

        return $this->renderController->render('@pages/admin/page/new');
    }

}
