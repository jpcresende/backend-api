<?php
namespace picpay\V1\Rest\Transaction\ResourceFactory;

use picpay\V1\Rest\Transaction\Resource\TransactionResource;

class TransactionResourceFactory
{
    public function __invoke($services)
    {
        $transactionService = $services->get('Transaction\Service\TransactionService');
        $transactionValidator = $services->get('Transaction\Validator\TransactionValidator');
        return new TransactionResource($transactionService, $transactionValidator);
    }
}
