<?php

namespace render\components\pages\components;

use application\Application;
use content\models\Page;
use render\components\pages\PageComponentBase;
use render\components\pages\PageComponentInterface;
use render\RenderController;
use request\Request;

class PageComponent extends PageComponentBase implements PageComponentInterface
{

    public const GET_PAGE_KEY = 'p';

    /**
     * @var Page
     */
    private $page;

    public function __construct(Request $request, RenderController $renderController)
    {
        parent::__construct($request, $renderController);

        $this->page = Page::load($this->req->getGet(self::GET_PAGE_KEY));
    }

    public function render(): string
    {
        return $this->renderController->render(
            '@pages/page',
            [
                'state' => Application::getInstance()->getState(),
                'page' => $this->page,
            ]
        );
    }

}
