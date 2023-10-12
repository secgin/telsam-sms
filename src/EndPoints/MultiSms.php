<?php

namespace YG\Telsam\Sms\EndPoints;

class MultiSms extends AbstractSendSms implements \YG\Telsam\Sms\Abstracts\EndPoints\MultiSms
{
    /**
     * @var string[]
     */
    private array $numbers;

    private string $content;

    private function __construct(array $numbers, string $content)
    {
        $this->numbers = $numbers;
        $this->content = $content;
    }

    public static function create(array $numbers, string $content): self
    {
        return new self($numbers, $content);
    }

    public function getNumbers(): array
    {
        return $this->numbers;
    }

    public function getContent(): string
    {
        return $this->content;
    }

    public function getSendingType(): int
    {
        return 1;
    }
}