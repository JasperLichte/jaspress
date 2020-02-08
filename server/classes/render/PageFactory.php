<?php

namespace render;

use render\components\pages\auth\LoginPage;
use render\components\pages\PagePage;
use render\components\pages\StartPage;
use render\controller\TwigController;
use request\Request;
use render\components\PageComponentInterface;

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
            case PageTypes::LOGIN:
                return new LoginPage($request, $renderController);
        }
        return new PagePage($request, $renderController);
    }

}
