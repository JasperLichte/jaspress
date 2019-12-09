<?php

    namespace render\components\content;

    use helper\Request;

    interface ContentComponentInterface
    {

        public function __construct(Request $request);

        public function render(): string;

        public function title(): string;

        public function jsFiles(): array;

        public function cssFiles(): array;

        public function headerIsExpanded(): bool;

    }