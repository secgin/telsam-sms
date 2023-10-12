<?php

namespace YG\Telsam\Sms\Abstracts\Core;

interface HttpClient
{
    public function post(Request $request): HttpResult;
}