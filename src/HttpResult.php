<?php

namespace YG\Telsam\Sms;

class HttpResult implements Abstracts\Core\HttpResult
{
    private bool $success;

    private ?string $errorCode;

    private ?string $errorMessage;

    private ?string $rawResult;

    private function __construct()
    {
        $this->rawResult = null;
        $this->errorCode = null;
        $this->errorMessage = null;
    }

    public static function success(?string $rawResult = null): HttpResult
    {
        $result = new self();
        $result->success = true;
        $result->rawResult = $rawResult;
        return $result;
    }

    public static function fail(string $errorCode, string $errorMessage): HttpResult
    {
        $result = new self();
        $result->success = false;
        $result->errorCode = $errorCode;
        $result->errorMessage = $errorMessage;
        return $result;
    }

    public function isSuccess(): bool
    {
        return $this->success;
    }

    public function getErrorCode(): ?string
    {
        return $this->errorCode;
    }

    public function getErrorMessage(): ?string
    {
        return $this->errorMessage;
    }

    public function getRawResult(): ?string
    {
        return $this->rawResult;
    }
}