<?php

namespace YG\Telsam\Sms\EndPoints;

use YG\Telsam\Sms\Abstracts;

abstract class AbstractSendSms implements Abstracts\EndPoints\SendSms
{
    private ?string $sender = null;

    private ?string $title = null;

    private ?int $encoding;

    private ?int $validity;

    private ?string $sendedDate = null;

    private ?bool $commercial;

    private ?bool $skipAhsQuery;

    private ?int $recipientType;

    private ?string $customId = null;

    public function getType(): int
    {
        return 1;
    }

    public function getSender(string $default = null): string
    {
        return $this->sender ?? $default;
    }

    public function getTitle(string $default = null): string
    {
        return $this->title ?? $default;
    }

    /**
     * @inheritDoc
     */
    public function getEncoding(int $default = null): int
    {
        return $this->encoding ?? $default ?? 0;
    }

    /**
     * @inheritDoc
     */
    public function getValidity(int $default = null): int
    {
        return $this->validity ?? $default ?? 1440;
    }

    /**
     * @inheritDoc
     */
    public function getSendingDate(): ?string
    {
        return $this->sendedDate;
    }

    /**
     * @inheritDoc
     */
    public function getCommercial(bool $default = null): bool
    {
        return $this->commercial ?? $default ?? false;
    }

    public function getSkipAhsQuery(bool $default = null): bool
    {
        return $this->skipAhsQuery ?? $default ?? false;
    }

    /**
     * @inheritDoc
     */
    public function getRecipientType(int $default = null): int
    {
        return $this->recipientType ?? $default ?? 0;
    }

    /**
     * @inheritDoc
     */
    public function getCustomId(): ?string
    {
        return $this->customId;
    }

    public function setSender(string $sender): self
    {
        $this->sender = $sender;
        return $this;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @param int $encoding 0:Default, 1:Turkish, 2:UTF-8
     */
    public function setEncoding(int $encoding): self
    {
        $this->encoding = $encoding;
        return $this;
    }

    /**
     * @param int $validity 60 ile 1440 arasında değer alabilir.
     */
    public function setValidity(int $validity): self
    {
        $this->validity = $validity;
        return $this;
    }

    /**
     * @param string $sendedDate yyyy-MM-dd HH:mm formatında olmalıdır.
     */
    public function setSendingDate(string $sendedDate): self
    {
        $this->sendedDate = $sendedDate;
        return $this;
    }

    public function setCommercial(bool $commercial): self
    {
        $this->commercial = $commercial;
        return $this;
    }

    public function setSkipAhsQuery(bool $skipAhsQuery): self
    {
        $this->skipAhsQuery = $skipAhsQuery;
        return $this;
    }

    /**
     * @param int $recipientType 0:Bireysel, 1:Tacir, 2:Bireysel ve Tacir
     */
    public function setRecipientType(int $recipientType): self
    {
        $this->recipientType = $recipientType;
        return $this;
    }

    public function setCustomId(?string $customId): self
    {
        $this->customId = $customId;
        return $this;
    }
}