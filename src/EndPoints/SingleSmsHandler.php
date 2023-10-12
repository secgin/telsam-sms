<?php

namespace YG\Telsam\Sms\EndPoints;

use YG\Telsam\Sms\Abstracts;
use YG\Telsam\Sms\Abstracts\AbstractHandler;
use YG\Telsam\Sms\Abstracts\EndPoints\SingleSms;

class SingleSmsHandler extends AbstractHandler
{
    public function handle(SingleSms $request): Abstracts\EndPoints\SendSmsResult
    {
        $request = $this->createBuilder('/sms/create')
            ->setData([
                'type' => $request->getType(),
                'sendingType' => $request->getSendingType(),
                'title' => $request->getTitle($this->config->get('title')),
                'content' => $request->getContent(),
                'number' => $request->getNumber(),
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