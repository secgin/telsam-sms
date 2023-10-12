<?php

namespace YG\Telsam\Sms\Abstracts\EndPoints;

interface SendSmsResult
{
    public function getPkgId(): ?int;
}