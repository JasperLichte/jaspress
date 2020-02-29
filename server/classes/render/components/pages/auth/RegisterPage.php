<?php

namespace render\components\pages\auth;


use render\components\PageComponent;

class RegisterPage extends PageComponent
{

    protected function render(): string
    {
        parent::render();

        return $this->renderController->render('@pages/auth/register');
    }

    public function title(): string
    {
        return $this->buildTitle('Register');
    }

}
