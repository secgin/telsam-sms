<?php

namespace YG\Telsam\Sms\Abstracts\Core;

interface Request
{
    public function setUri(string $uri): void;

    public function getUri(): string;


    public function setHeaders(array $headers): void;

    public function getHeaders(): array;


    public function setBody(array $body): void;

    public function getBody(): array;
}