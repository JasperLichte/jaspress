<?php

namespace api;

use Exception;
use render\controller\TwigController;

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

    /** @var string */
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
        $this->setMessage($message);

        return $this;
    }

    public function setSuccessMessage(string $message): ApiResponse
    {
        $this->setSuccess(true);
        $this->setMessage($message);

        return $this;
    }

    public function status(int $statusCode): ApiResponse
    {
        $this->statusCode = $statusCode;

        return $this;
    }

    public function withData($data): ApiResponse
    {
        $this->data = $data;

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

        http_response_code($this->statusCode);

        if (ResponseFormat::isValidValue($this->format)) {
            header('Content-Type: ' . $this->format);
        }

        switch ($this->format) {
            case ResponseFormat::JSON:
                return json_encode($retVals);
            case ResponseFormat::HTML:
                return (new TwigController())->render('@api/response', $retVals, true);
        }
        return '';
    }

}
