<?php

namespace YG\Telsam\Sms\Abstracts\Core;

interface Config
{
    public function get(string $key): ?string;
}