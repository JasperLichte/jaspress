<?php

namespace render\components\pages;

use render\components\PageComponent;
use request\Request;
use request\Url;

class StartPage extends PageComponent
{

    public static function shouldRenderPageContent(Request $request): bool
    {
        return ($request->issetGet(PagePage::GET_PAGE_KEY)
            && !empty($request->getGet(PagePage::GET_PAGE_KEY))
        );
    }

    protected function render(): string
    {
        parent::render();

        return $this->renderController->render('@pages/start');
    }

    public function title(): string
    {
        return $this->buildTitle('Start');
    }

    public static function endPoint(): Url
    {
        return new Url('/');
    }

}
