<?php

namespace api\actions;

use api\ApiResponse;
use request\Request;

class Action
{

    /** @var int */
    protected $statusCode = 200;

    /** @var Request */
    protected $req;

    /** @var ApiResponse */
    protected $res;

    /**  @var string */
    protected $contentType = 'application/json';

    public function __construct()
    {
        $this->req = new Request();
        $this->res = new ApiResponse();
    }

    protected function setContentType(string $contentType)
    {
        header('Content-Type: ' . (string)$contentType);
    }

    public function getStatusCode(): int
    {
        return $this->statusCode;
    }

    protected function setStatusCode(int $statusCode): void
    {
        $this->statusCode = $statusCode;
    }

    public function run(): string
    {
        return '';
    }

}
