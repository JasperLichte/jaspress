<?php

namespace render\components\content\components;

use application\Application;
use content\models\Page;
use render\components\content\ContentComponent;
use render\components\content\ContentComponentInterface;
use request\Request;

class PageComponent extends ContentComponent implements ContentComponentInterface
{

    public const GET_PAGE_KEY = 'p';

    /**
     * @var Page
     */
    private $page;

    public function __construct(Request $request)
    {
        parent::__construct($request);

        $this->page = Page::load($this->req->getGet(self::GET_PAGE_KEY));
    }

    public function render(): string
    {
        return $this->twig->render(
            '@pages/page.twig',
            [
                'state' => Application::getInstance()->getState(),
                'page' => $this->page,
            ]
        );
    }

}
