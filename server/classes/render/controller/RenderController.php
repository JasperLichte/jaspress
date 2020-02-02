<?php

namespace render\controller;

interface RenderController
{

    public function render(string $template, array $arguments = []): string;

}
