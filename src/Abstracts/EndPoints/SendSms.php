<?php

namespace YG\Telsam\Sms\Abstracts\EndPoints;

interface SendSms
{
    public function getType(): int;

    public function getSendingType(): int;

    public function getSender(string $default = null): string;

    public function getTitle(string $default = null): string;

    /**
     * @return int
     * 0:Default, 1:Türkçe, 2:UTF-8 olarak döner. Varsayılan 0 dır.
     */
    public function getEncoding(int $default = null): int;

    /**
     * @return int|null
     * Mesajın geçerlilik süresi. Minimum 60, maksimum 1440 değeri alır. Varsayılan 1440 dır.
     */
    public function getValidity(int $default = null): int;

    /**
     * @return string|null
     * İleri tarihli SMS gönderilmek isteniyorsa kullanılır. Format "yyyy-MM-dd HH:mm"
     */
    public function getSendingDate(): ?string;

    /**
     * @return bool
     * Ticari gönderimlerde true değeri alır.
     */
    public function getCommercial(bool $default = null): bool;

    public function getSkipAhsQuery(bool $default = null): bool;

    /**
     * @return int
     * AHS sorgu tipini belirler. 0:Bireysel, 1:Tacir, 2:Hem bireysel hem tacir. Varsayılan 0 dır.
     */
    public function getRecipientType(int $default = null): int;

    /**
     * @return string|null
     * Kullanıcı kendi sistemindeki id ‘ler ile eşleştirme yapabilmek için kullanılan parametre.
     */
    public function getCustomId(): ?string;
}