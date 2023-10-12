<?php

namespace YG\Telsam\Sms;

use YG\Telsam\Sms\Abstracts\Core\Request;

class CurlHttpClient implements Abstracts\Core\HttpClient
{
    private string $serviceUrl;

    public function __construct(string $serviceUrl)
    {
        $this->serviceUrl = $serviceUrl;
    }

    public function post(Request $request): HttpResult
    {
        $httpHeader = array_map(function ($key, $value) {
            return $key . ':' . $value;
        }, array_keys($request->getHeaders()), $request->getHeaders());

        try
        {
            $options = [
                CURLOPT_POST => true,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_HTTPHEADER => $httpHeader,
                CURLOPT_TIMEOUT => 120,
                CURLOPT_POSTFIELDS => json_encode($request->getBody(), JSON_UNESCAPED_UNICODE),
            ];

            $ch = curl_init($this->serviceUrl  . $request->getUri());
            curl_setopt_array($ch, $options);

            $result = curl_exec($ch);

            $requestResult = $result === false
                ? HttpResult::fail(curl_errno($ch), curl_error($ch))
                : HttpResult::success($result);

            curl_close($ch);
        }
        catch (\Exception $e)
        {
            $requestResult = HttpResult::fail($e->getCode(), $e->getMessage());
        }

        return $requestResult;
    }
}