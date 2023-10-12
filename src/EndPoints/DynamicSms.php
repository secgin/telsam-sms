<?php

namespace YG\Telsam\Sms\EndPoints;

class DynamicSms extends AbstractSendSms implements \YG\Telsam\Sms\Abstracts\EndPoints\DynamicSms
{
    private array $numbers;

    private function __construct(array $numbersAndMessages)
    {
        return $this->numbers = $numbersAndMessages;
    }

    public static function create(array $numbersAndMessages = []): self
    {
        return new self($numbersAndMessages);
    }

    public function addNumber(string $number, string $message): self
    {
        $this->numbers[$number] = $message;
        return $this;
    }

    public function getNumbers(): array
    {
        return $this->numbers;
    }

    public function getSendingType(): int
    {
        return 2;
    }
}