<?php

namespace YG\Telsam\Sms;

/**
 * @method Config apiUrl(string $url)
 * @method Config username(string $username)
 * @method Config password(string $password)
 * @method Config defaultSender(string $sender)
 * @method Config defaultTitle(string $title)
 * @method Config defaultEncoding(string $encoding)
 * @method Config defaultValidity(int $validity)
 * @method Config defaultCommercial(bool $commercial)
 * @method Config defaultSkipAhsQuery(bool $skipAhsQuery)
 * @method Config defaultRecipientType(int $recipientType)
 */
class Config implements Abstracts\Core\Config
{
    private array $items = [];

    private array $methods = [
        'apiUrl',
        'username',
        'password',
        'defaultSender',
        'defaultTitle',
        'defaultEncoding',
        'defaultValidity',
        'defaultCommercial',
        'defaultSkipAhsQuery',
        'defaultRecipientType',
    ];

    private function __construct(array $config)
    {
        $this->items = $config;
    }

    public static function create(array $config = []): self
    {
        return new self($config);
    }

    public function get(string $key): ?string
    {
        return $this->items[$key] ?? null;
    }

    public function __call(string $name, array $arguments)
    {
        if (in_array($name, $this->methods))
        {
            if (substr($name, 0, 7) === 'default')
            {
                $key = lcfirst(substr($name, 7));
                $this->items[$key] = $arguments[0];
            }
            else
            {
                $this->items[$name] = $arguments[0];
            }
        }

        return $this;
    }
}