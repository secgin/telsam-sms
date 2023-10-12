<?php

namespace YG\Telsam\Sms\Abstracts;

use YG\Telsam\Sms\Abstracts\Core\Config;
use YG\Telsam\Sms\Abstracts\Core\HttpClient;
use YG\Telsam\Sms\RequestBuilder;

abstract class AbstractHandler
{
    protected Config $config;

    protected HttpClient $httpClient;

    public function setConfig(Config $config): void
    {
        $this->config = $config;
    }

    public function setHttpClient(HttpClient $httpClient): void
    {
        $this->httpClient = $httpClient;
    }

    protected function createBuilder(string $uri): RequestBuilder
    {
        return RequestBuilder::create($uri)
            ->setUsername($this->config->get('username'))
            ->setPassword($this->config->get('password'));
    }
}