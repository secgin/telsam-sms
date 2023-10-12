<?php

namespace YG\Telsam\Sms\Abstracts;

use YG\Telsam\Sms\Abstracts\Core\Response;
use YG\Telsam\Sms\Abstracts\EndPoints\DynamicSms;
use YG\Telsam\Sms\Abstracts\EndPoints\MultiSms;
use YG\Telsam\Sms\Abstracts\EndPoints\SendSmsResult;
use YG\Telsam\Sms\Abstracts\EndPoints\SingleSms;

/**
 * @method static Response|SendSmsResult sendSingleSms(SingleSms $request)
 * @method static Response|SendSmsResult sendMultiSms(MultiSms $request)
 * @method static Response|SendSmsResult sendDynamicSms(DynamicSms $request)
 */
interface ApiClient
{

}