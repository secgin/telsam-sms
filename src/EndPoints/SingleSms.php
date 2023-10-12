<?php

namespace YG\Telsam\Sms\EndPoints;

use YG\Telsam\Sms\Abstracts;

class SingleSms extends AbstractSendSms implements Abstracts\EndPoints\SingleSms
{
    private string $number;

    private string $content;

    private function __construct(string $number, string $content)
    {
        $this->number = $number;
        $this->content = $content;
    }

    public static function create(string $number, string $content): self
    {
        return new self($number, $content);
    }

    public function getNumber(): string
    {
        return $this->number;
    }

    public function getContent(): string
    {
        return $this->content;
    }

    public function getSendingType(): int
    {
        return 0;
    }
}