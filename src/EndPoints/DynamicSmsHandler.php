<?php

namespace YG\Telsam\Sms\EndPoints;

use YG\Telsam\Sms\Abstracts\AbstractHandler;
use YG\Telsam\Sms\Abstracts\EndPoints\DynamicSms;

class DynamicSmsHandler extends AbstractHandler
{
    public function handle(DynamicSms $request): \YG\Telsam\Sms\Abstracts\EndPoints\SendSmsResult
    {
        $request = $this->createBuilder('/sms/create')
            ->setData([
                'type' => $request->getType(),
                'sendingType' => $request->getSendingType(),
                'title' => $request->getTitle($this->config->get('title')),
                'numbers' => array_map(function ($content, $number) {
                    return [
                        'nr' => $number,
                        'msg' => $content
                    ];
                }, $request->getNumbers(), array_keys($request->getNumbers())),
                'encoding' => $request->getEncoding($this->config->get('encoding')),
                'sender' => $request->getSender($this->config->get('sender')),
                'sendingDate' =>  $request->getSendingDate(),
                'validity' => $request->getValidity($this->config->get('validity')),
                'commercial' => $request->getCommercial($this->config->get('commercial')),
                'skipAhsQuery' => $request->getSkipAhsQuery($this->config->get('skipAhsQuery')),
                'recipientType' => $request->getRecipientType($this->config->get('recipientType')),
                'customID' => $request->getCustomId()
            ])
            ->build();

        $result = $this->httpClient->post($request);

        return SendSmsResult::create($result);
    }
}