<?php

namespace YG\Telsam\Sms\Abstracts;

use YG\Telsam\Sms\Abstracts\Core\HttpResult;
use YG\Telsam\Sms\Abstracts\Core\Response;

class AbstractResponse implements Response
{
    protected bool $success;

    protected ?array $result;

    private ?string $errorCode;

    private ?string $errorStatus;

    protected ?string $errorMessage;

    public function __construct(HttpResult $requestResult)
    {
        $this->success = false;
        $this->result = null;
        $this->errorCode = null;
        $this->errorStatus = null;
        $this->errorMessage = null;

        if ($requestResult->isSuccess() and $requestResult->getRawResult() != null)
        {
            $this->result = json_decode($requestResult->getRawResult(), true);

            if (isset($this->result['err']))
            {
                $this->success = false;
                $this->errorCode = $this->result['err']['code'] ?? null;
                $this->errorStatus = $this->result['err']['status'] ?? null;
                $this->errorMessage = $this->result['err']['message'] ?? null;
            }
            else
                $this->success = true;
        }
        else
        {
            $this->success = false;
            $this->result = null;
            $this->errorCode = $requestResult->getErrorCode();
            $this->errorMessage = $requestResult->getErrorMessage();
        }
    }

    #region QueryResult Interface Methods
    public function isSuccess(): bool
    {
        return $this->success;
    }

    public function getResult(): ?array
    {
        return $this->result ?? null;
    }

    public function getErrorCode(): ?string
    {
        return $this->errorCode;
    }

    public function getErrorStatus(): ?string
    {
        return $this->errorStatus;
    }

    public function getErrorMessage(): ?string
    {
        return $this->errorMessage;
    }
    #endregion
}