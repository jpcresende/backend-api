<?php

namespace picpay\V1\Rest\Transaction\DTO\User;

class User
{
    const TYPE_USER_COMMON = "C";
    const TYPE_USER_LOGIST = "L";

    private array $user;

    public function get(): array
    {
        $this->user = [
            1 => [
                "id" => 1,
                "name" => "João Paulo Resende",
                "cpf" => "02729863696",
                "mail" => "joao@gmail.com",
                "pass" => "123456",
                "type" => self::TYPE_USER_COMMON,
                "balance" => 100.00
            ],
            2 => [
                "id" => 2,
                "name" => "Pedro Silva",
                "cpf" => "25469856542",
                "mail" => "pedro@gmail.com",
                "pass" => "654321",
                "type" => self::TYPE_USER_LOGIST,
                "balance" => 25.00
            ]
        ];

        return $this->user;
    }
}
