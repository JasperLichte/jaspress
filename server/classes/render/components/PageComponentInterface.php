<?php

namespace render\components;

use render\controller\RenderController;
use request\Request;
use request\Url;

interface PageComponentInterface
{

    public function __construct(Request $request, RenderController $renderController);

    public function render(): string;

    public static function endPoint(): Url;

    public function title(): string;

    public function jsFiles(): array;

    public function cssFiles(): array;

}
