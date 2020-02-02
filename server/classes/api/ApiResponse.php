<?php

namespace api;


use Exception;

class ApiResponse
{

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

    public function asJson(): string
    {
        try {
            return json_encode([
                'success' => $this->success,
                'message' => $this->message,
                'data'    => $this->data,
            ]);
        } catch (Exception $e) {}
        return '';
    }

}
