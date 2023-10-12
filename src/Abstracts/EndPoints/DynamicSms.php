<?php

namespace YG\Telsam\Sms\Abstracts\EndPoints;

interface DynamicSms extends SendSms
{
    /**
     * @return array <string number, string content>
     */
    public function getNumbers(): array;
}