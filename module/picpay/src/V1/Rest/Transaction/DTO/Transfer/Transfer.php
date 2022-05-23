<?php

namespace picpay\V1\Rest\Transaction\DTO\Transfer;

class Transfer
{
    private array $transfer;

    public function get(): array
    {
        $this->transfer[] = [
            [
                "idTransfer" => 1,
                "idSenderUser" => 1,
                "idReceiveUser" => 2,
                "value" => 100,
            ],
            [
                "idTransfer" => 2,
                "idSenderUser" => 2,
                "idReceiveUser" => 1,
                "value" => 30,
            ]
        ];

        return $this->transfer;
    }
}
