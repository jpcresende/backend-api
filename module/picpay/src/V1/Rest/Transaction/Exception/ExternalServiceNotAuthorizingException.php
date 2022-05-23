<?php

namespace picpay\V1\Rest\Transaction\Exception;

use DomainException;

class ExternalServiceNotAuthorizingException extends DomainException
{
    const MESSAGE = "Operaчуo nуo autorizada, favor tentar mais tarde.";

    public static function throwException()
    {
        throw new self(sprintf(self::MESSAGE), 412);
    }
}
