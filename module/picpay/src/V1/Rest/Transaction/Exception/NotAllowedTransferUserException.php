<?php

namespace picpay\V1\Rest\Transaction\Exception;

use DomainException;

class NotAllowedTransferUserException extends DomainException
{
    const MESSAGE = "Tipo de usuário não permitido para realizar transferências.";

    public static function throwException()
    {
        throw new self(sprintf(self::MESSAGE), 412);
    }
}
