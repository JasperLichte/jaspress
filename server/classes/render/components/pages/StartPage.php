<?php

namespace render\components\pages;

use render\components\PageComponentBase;
use render\components\PageComponentInterface;
use request\Request;
use request\Url;

class StartPage extends PageComponentBase implements PageComponentInterface
{

    public static function shouldRenderPageContent(Request $request): bool
    {
        return ($request->issetGet(PagePage::GET_PAGE_KEY)
            && !empty($request->getGet(PagePage::GET_PAGE_KEY))
        );
    }
    
    public function render(): string
    {
        return $this->renderController->render('@pages/start', []);
    }

    public static function endPoint(): Url
    {
        return new Url('/');
    }

}
