<?php

namespace picpay\V1\Rest\Transaction\DTO\TransferRule;

use picpay\V1\Rest\Transaction\DTO\User\User;

class TransferRule
{
    private array $rules;

    public function get(): array
    {
        $this->rules[] = [
            [
                "id" => 1,
                "type" => User::TYPE_USER_COMMON,
                "sendTransfer" => true
            ],
            [
                "id" => 2,
                "type" => User::TYPE_USER_LOGIST,
                "sendTransfer" => false
            ]
        ];

        return $this->rules;
    }
}
