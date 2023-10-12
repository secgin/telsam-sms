<?php

namespace YG\Telsam\Sms\EndPoints;

use YG\Telsam\Sms\Abstracts;
use YG\Telsam\Sms\Abstracts\AbstractResponse;
use YG\Telsam\Sms\Abstracts\Core\HttpResult;

class SendSmsResult extends AbstractResponse implements Abstracts\EndPoints\SendSmsResult
{
    public static function create(HttpResult $result): self
    {
        return new self($result);
    }

    public function getPkgId(): ?int
    {
        return $this->result['data']['pkgID'] ?? null;
    }
}