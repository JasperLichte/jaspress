<?php


namespace render\components\content\components;

use render\components\content\ContentComponent;
use render\components\content\ContentComponentInterface;

class StartContent extends ContentComponent implements ContentComponentInterface
{

    public function render(): string
    {
        return $this->twig->render('@pages/start.twig', []);
    }

}
