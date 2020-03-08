<?php

namespace api;

use application\Environment;
use Exception;
use render\controller\TwigController;
use util\exceptions\InvalidArgumentsException;
use util\exceptions\LogicException;

class ApiResponse
{

    /**
     * enum ResponseFormats
     * @var string
     */
    private $format = ResponseFormat::JSON;

    /** @var int */
    private $statusCode = 200;

    /** @var bool */
    private $success = null;

    /** @var string */
    private $message = '';

    /** @var array */
    private $data = [];

    public function setSuccess(bool $success): ApiResponse
    {
        $this->success = $success;

        return $this;
    }

    public function setMessage(string $message): ApiResponse
    {
        $this->message = $message;

        return $this;
    }

    public function setErrorMessage(string $message): ApiResponse
    {
        $this->setSuccess(false);
        $this->status(500);
        $this->setMessage($message);

        return $this;
    }

    public function setSuccessMessage(string $message): ApiResponse
    {
        $this->setSuccess(true);
        $this->status(200);
        $this->setMessage($message);

        return $this;
    }

    public function status(int $statusCode): ApiResponse
    {
        $this->statusCode = $statusCode;

        return $this;
    }

    public function withData(array $data): ApiResponse
    {
        $this->data = (array)$data;

        return $this;
    }

    public function exception(Exception $e): ApiResponse
    {
        $this->setErrorMessage($e->getMessage());

        return $this;
    }

    public function asJson(): ApiResponse
    {
        $this->format = ResponseFormat::JSON;

        return $this;
    }

    public function asHtml(): ApiResponse
    {
        $this->format = ResponseFormat::HTML;

        return $this;
    }

    public function __toString(): string
    {
        $retVals = [
            'status' => $this->statusCode,
        ];
        if ($this->success !== null) {
            $retVals['success'] = $this->success;
        }
        if (!empty($this->message)) {
            $retVals['message'] = $this->message;
        }
        if (!empty($this->data)) {
            $retVals['data'] = $this->data;
        }

        $env = Environment::getInstance();
        try {
            header('Access-Control-Allow-Origin: ' . $env->get('CLIENT_ROOT_URL'));
        } catch(InvalidArgumentsException $e) {}

        header('Access-Control-Allow-Credentials: true');
        header('Access-Control-Allow-Headers: content-type');
        if (ResponseFormat::isValidValue($this->format)) {
            header('Content-Type: ' . $this->format);
        }
        http_response_code($this->statusCode);

        switch ($this->format) {
            case ResponseFormat::JSON:
                return json_encode($retVals);
            case ResponseFormat::HTML:
                return (new TwigController())->render('@api/response', $retVals, true);
        }
        return '';
    }

    public function getMessage(): string
    {
        return $this->message;
    }

    public function isSuccess(): ?bool
    {
        return $this->success;
    }

}
