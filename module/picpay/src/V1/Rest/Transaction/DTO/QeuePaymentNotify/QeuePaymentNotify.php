<?php

namespace picpay\V1\Rest\Transaction\DTO\QeuePaymentNotify;

class QeuePaymentNotify
{
    const TYPE_NOTIFY_MAIL = "1";
    const TYPE_NOTIFY_SMS = "2";

    private array $qeuePaymentNotify;

    public function get(): array
    {
        $this->qeuePaymentNotify[] = [
            [
                "idQeuePaymentNotify" => 1,
                "idReceivePaymentUser" => 1,
                "value" => 100,
                "typeNotify" => self::TYPE_NOTIFY_MAIL,
            ],
            [
                "idQeuePaymentNotify" => 2,
                "idReceivePaymentUser" => 2,
                "value" => 30,
                "typeNotify" => self::TYPE_NOTIFY_SMS,
            ]
        ];

        return $this->qeuePaymentNotify;
    }
}
