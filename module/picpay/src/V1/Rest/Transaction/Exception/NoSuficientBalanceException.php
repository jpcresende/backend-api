<?php

namespace picpay\V1\Rest\Transaction\Exception;

use DomainException;

class NoSuficientBalanceException extends DomainException
{
    const MESSAGE = "Saldo insuficiente para realizar essa opera��o.";

    public static function throwException()
    {
        throw new self(sprintf(self::MESSAGE), 412);
    }
}
