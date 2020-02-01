<?php


namespace render\components\content\components;

use render\components\content\ContentComponent;
use render\components\content\ContentComponentInterface;
use request\Request;

class StartComponent extends ContentComponent implements ContentComponentInterface
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
