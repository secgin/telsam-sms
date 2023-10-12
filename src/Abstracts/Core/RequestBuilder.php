<?php

namespace YG\Telsam\Sms\Abstracts\Core;

interface RequestBuilder
{
    public function build(): Request;
}