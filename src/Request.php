<?php

namespace YG\Telsam\Sms;

class Request implements Abstracts\Core\Request
{
    private string $uri;

    private array $headers;

    private array $body;

    public function setUri(string $uri): void
    {
        $this->uri = $uri;
    }

    public function getUri(): string
    {
        return $this->uri ?? '';
    }

    public function setHeaders(array $headers): void
    {
        $this->headers = $headers;
    }

    public function getHeaders(): array
    {
        return $this->headers ?? [];
    }

    public function setBody(array $body): void
    {
        $this->body = $body;
    }

    public function getBody(): array
    {
        return $this->body ?? [];
    }
}