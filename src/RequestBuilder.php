<?php

namespace YG\Telsam\Sms;

class RequestBuilder implements Abstracts\Core\RequestBuilder
{
    private string $uri;

    private string $username;

    private string $password;

    private array $data;

    private function __construct(string $uri)
    {
        $this->uri = $uri;
        $this->data = [];
    }

    public static function create(string $uri): self
    {
        return new self($uri);
    }

    public function setData($data): self
    {
        $this->data = $data;
        return $this;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;
        return $this;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;
        return $this;
    }

    public function build(): Request
    {
        $header =  [
            'Content-Type' => 'application/json',
            'Authorization' => 'Basic ' . base64_encode($this->username . ':' . $this->password),
        ];

        $request = new Request();
        $request->setUri($this->uri);
        $request->setHeaders($header);
        $request->setBody($this->data);
        return $request;
    }
}