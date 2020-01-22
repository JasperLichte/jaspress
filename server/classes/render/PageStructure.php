<?php

namespace render;

class PageStructure
{

    private function cssFiles(): array
    {
        return [
            'document.css',
            'components/header.css',
            'components/footer.css',
            'components/main.css',
        ];
    }

    private function jsFiles(): array
    {
        return [];
    }
}
