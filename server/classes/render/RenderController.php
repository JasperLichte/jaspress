<?php

namespace render;

interface RenderController
{

    public function render(string $template, array $arguments): string;

}
