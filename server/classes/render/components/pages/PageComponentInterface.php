<?php

namespace render\components\pages;

use render\RenderController;
use request\Request;

interface PageComponentInterface
{

    public function __construct(Request $request, RenderController $renderController);

    public function render(): string;

    public function title(): string;

    public function jsFiles(): array;

    public function cssFiles(): array;

    public function headerIsExpanded(): bool;

}
