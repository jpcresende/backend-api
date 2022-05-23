<?php

namespace picpay\V1\Rest\Transaction\Exception;

use DomainException;

class NotAllowedTransferUserException extends DomainException
{
    const MESSAGE = "Tipo de usu�rio n�o permitido para realizar transfer�ncias.";

    public static function throwException()
    {
        throw new self(sprintf(self::MESSAGE), 412);
    }
}
