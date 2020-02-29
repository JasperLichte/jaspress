<?php

namespace render\components\pages\auth;

use request\Url;

class LoginPage extends AuthPage
{

    protected function render(): string
    {
        parent::render();

        return $this->renderController->render('@pages/auth/login');
    }

    public function title(): string
    {
        return $this->buildTitle('Login');
    }

    public static function endPoint(): Url
    {
        return Url::to('/auth/login.php');
    }

}
