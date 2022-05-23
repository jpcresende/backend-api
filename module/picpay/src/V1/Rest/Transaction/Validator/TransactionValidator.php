<?php

namespace picpay\V1\Rest\Transaction\Validator;

use DomainException;
use Laminas\Http\Client;
use Laminas\Http\Request;
use picpay\V1\Rest\Transaction\Utils\Externals\API\TransferAuthorizing\ClientTransferAuthorizing;
use picpay\V1\Rest\Transaction\Exception\NoSuficientBalanceException;
use stdClass;
use picpay\V1\Rest\Transaction\DTO\User\User;
use picpay\V1\Rest\Transaction\Exception\ExternalServiceNotAuthorizingException;
use picpay\V1\Rest\Transaction\Exception\NotAllowedTransferUserException;

class TransactionValidator implements AbstractValidatorInterface
{
    private User $userDto;

    public function __construct()
    {
        $this->userDto = new User();
    }

    /**
     * Realizar as validações de regra de negocio da transação
     * @param stdClass $data
     * @return void
     * @throws DomainException
     */
    public function validate(stdClass $data): void
    {
        $arrUser = $this->userDto->get();
        $arrPayerUser = $arrUser[$data->payer];

        if (isset($arrPayerUser["type"]) && $arrPayerUser["type"] !== User::TYPE_USER_COMMON) {
            NotAllowedTransferUserException::throwException();
        }

        if (isset($arrPayerUser["balance"]) && (float)$arrPayerUser["balance"] < (float)$data->value) {
            NoSuficientBalanceException::throwException();
        }

        $clientTransferAuthorizing = new ClientTransferAuthorizing(new Request(), new Client());
        $isTransferAuthorizing = $clientTransferAuthorizing->queryTransferAuthorizing();

        if (true !== $isTransferAuthorizing) {
            ExternalServiceNotAuthorizingException::throwException();
        }
    }
}
