<?php

namespace YG\Telsam\Sms\Abstracts\Core;

interface Response
{
    public function isSuccess(): bool;

    public function getResult(): ?array;

    public function getErrorCode(): ?string;

    public function getErrorStatus(): ?string;

    public function getErrorMessage(): ?string;
}