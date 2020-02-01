<?php


namespace render\components\pages\components;

use render\components\pages\PageComponentBase;
use render\components\pages\PageComponentInterface;
use request\Request;

class StartComponent extends PageComponentBase implements PageComponentInterface
{

    public static function shouldRenderPageContent(Request $request): bool
    {
        return ($request->issetGet(PageComponent::GET_PAGE_KEY)
            && !empty($request->getGet(PageComponent::GET_PAGE_KEY))
        );
    }
    
    public function render(): string
    {
        return $this->twig->render('@pages/start.twig', []);
    }

}
