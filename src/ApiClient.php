<?php

namespace YG\Telsam\Sms;

use YG\Telsam\Sms\Abstracts\AbstractHandler;
use YG\Telsam\Sms\Abstracts\Core\HttpClient;
use YG\Telsam\Sms\Abstracts\Core\Response;
use YG\Telsam\Sms\Abstracts\EndPoints\SingleSms;
use YG\Telsam\Sms\EndPoints\DynamicSmsHandler;
use YG\Telsam\Sms\EndPoints\MultiSmsHandler;
use YG\Telsam\Sms\EndPoints\SendSmsResult;
use YG\Telsam\Sms\EndPoints\SingleSmsHandler;

/**
 * @method Response|SendSmsResult sendSingleSms(SingleSms $request)
 */
class ApiClient implements Abstracts\ApiClient
{
    private Config $config;

    private HttpClient $httpClient;

    private array $requestClasses = [
        'sendSingleSms' => SingleSmsHandler::class,
        'sendMultiSms' => MultiSmsHandler::class,
        'sendDynamicSms' => DynamicSmsHandler::class
    ];


    public function __construct(Config $config)
    {
        $this->config = $config;
        $this->httpClient = new CurlHttpClient($this->config->get('apiUrl'));
    }

    public function __call($name, $arguments)
    {
        if ($this->hasRequestClass($name))
            return $this->handle($name, $arguments[0] ?? null);

        throw new \Exception('Method not found');
    }

    #region Handler Methods
    private function hasRequestClass(string $name): bool
    {
        return isset($this->requestClasses[$name]);
    }

    private function getRequestHandler($name)
    {
        $requestHandlerClass = $this->requestClasses[$name];
        $handler = new $requestHandlerClass();

        if ($handler instanceof AbstractHandler)
        {
            $handler->setConfig($this->config);
            $handler->setHttpClient($this->httpClient);
        }
        return $handler;
    }

    private function handle(string $requestName, $request): Response
    {
        return $this->getRequestHandler($requestName)->handle($request);
    }
    #endregion
}