<?php

namespace YG\Telsam\Sms\EndPoints;

use YG\Telsam\Sms\Abstracts\AbstractHandler;
use YG\Telsam\Sms\Abstracts\EndPoints\MultiSms;

class MultiSmsHandler extends AbstractHandler
{
    public function handle(MultiSms $request): \YG\Telsam\Sms\Abstracts\EndPoints\SendSmsResult
    {
        $request = $this->createBuilder('/sms/create')
            ->setData([
                'type' => $request->getType(),
                'sendingType' => $request->getSendingType(),
                'title' => $request->getTitle($this->config->get('title')),
                'content' => $request->getContent(),
                'numbers' => $request->getNumbers(),
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