<?php

namespace YG\Telsam\Sms;

use YG\Telsam\Sms\Abstracts\AbstractResponse;

final class Result extends AbstractResponse
{
    public static function create(HttpResult $result): self
    {
        return new self($result);
    }
}