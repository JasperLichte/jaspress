<?php

namespace render;

use render\components\pages\components\PagePage;
use render\components\pages\components\StartPage;
use request\Request;
use render\components\pages\PageComponentInterface;

class PageFactory
{

    public static function get(string $pageKey, Request $request): PageComponentInterface
    {
        $renderController = new TwigController();
        switch ($pageKey) {
            case PageTypes::START:
                if (StartPage::shouldRenderPageContent($request)) {
                    return new PagePage($request, $renderController);
                }
                return new StartPage($request, $renderController);
        }
        return new PagePage($request, $renderController);
    }

}
