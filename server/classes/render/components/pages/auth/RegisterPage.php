<?php

namespace render\components\pages\auth;

use request\Url;

class RegisterPage extends AuthPage
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

    public static function endPoint(): Url
    {
        return Url::to('/auth/register.php');
    }

}
