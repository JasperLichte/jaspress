<?php

namespace request;

use application\App;
use auth\models\User;
use config\Config;
use database\Connection;

class Request
{
    /** @var array */
    private $get;

    /** @var array */
    private $post;

    public function __construct()
    {
        $this->get = $_GET;
        $this->post = $_POST;
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

    public function getUser(): ?User
    {
        return App::getInstance()->getState()->getUser();
    }

    public function redirectTo($url): void
    {
        if (is_string($url)) {
            header('Location: ' . Url::to($url));
            exit();
        }
        if ($url instanceof Url) {
            header('Location: ' . $url);
            exit();
        }
    }

    public function getIp(): string
    {
        if (isset($_SERVER['REMOTE_ADDR']) && !empty($_SERVER['REMOTE_ADDR'])) {
            return $_SERVER['REMOTE_ADDR'];
        }
        return '';
    }

    public function isLocal()
    {
        return in_array($this->getIp(), [
            '127.0.0.1',
            '::1',
            'localhost'
        ]);
    }

    public function getRequestedPath(): string
    {
        return parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    }

    public function save()
    {
        if ($this->isLocal()) {
            return;
        }

        (Connection::getInstance())()
            ->prepare('INSERT INTO requests (ip, path, time) VALUES (?, ?, NOW())')
            ->execute([$this->getIp(), $this->getRequestedPath()]);
    }

}
