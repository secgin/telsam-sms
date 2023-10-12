<?php

namespace YG\Telsam\Sms\Abstracts\EndPoints;

interface MultiSms extends SendSms
{
    /**
     * @return string[]
     */
    public function getNumbers(): array;

    public function getContent(): string;
}