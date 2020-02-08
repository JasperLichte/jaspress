<?php

namespace render\components\pages\auth;


use render\components\PageComponentBase;
use render\components\PageComponentInterface;
use request\Url;

class LoginPage extends PageComponentBase implements PageComponentInterface
{

    public function render(): string
    {
        return $this->renderController->render('@pages/auth/login');
    }

    public static function endPoint(): Url
    {
        return new Url('/_/auth/login.php');
    }

}