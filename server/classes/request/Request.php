<?php

namespace request;

use application\Application;
use auth\models\User;
use config\Config;

class Request
{
    /** @var array */
    private $get;

    /** @var array */
    private $post;

    /** @var User */
    private $user;

    public function __construct()
    {
        $this->get = $_GET;
        $this->post = $_POST;
        $this->user = Application::getInstance()->getState()->getUser();
    }

    public function getAllPost(): array
    {
        return $this->post;
    }

    public function getAllGet(): array
    {
        return $this->get;
    }

    public function issetPost(string $key): bool
    {
        return isset($this->post[$key]);
    }

    public function issetGet(string $key): bool
    {
        return isset($this->get[$key]);
    }

    public function getPost(string $key): string
    {
        return $this->post[$key];
    }

    public function getGet(string $key): string
    {
        return $this->get[$key];
    }

    public function getUser(): User
    {
        return $this->user;
    }

    public function redirectTo(Url $url): void
    {
        $url->setPath(Config::ROOT_URL() . $url->getPath());

        header('Location: ' . $url->getPath());
        exit();
    }

}
