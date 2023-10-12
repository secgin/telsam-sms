<?php

namespace YG\Telsam\Sms\Abstracts\EndPoints;

interface SingleSms extends SendSms
{
    public function getNumber(): string;

    public function getContent(): string;
}