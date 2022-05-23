<?php
namespace picpay\V1\Rest\Transaction\Resource;

use Exception;
use picpay\V1\Rest\Transaction\Service\AbstractServiceInterface;
use Laminas\ApiTools\ApiProblem\ApiProblem;
use Laminas\ApiTools\Rest\AbstractResourceListener;
use Laminas\ApiTools\ApiProblem\ApiProblemResponse;
use picpay\V1\Rest\Transaction\Validator\AbstractValidatorInterface;

class TransactionResource extends AbstractResourceListener
{
    private AbstractServiceInterface $service;
    private AbstractValidatorInterface $validator;

    public function __construct(AbstractServiceInterface $services, AbstractValidatorInterface $transactionValidator)
    {
        $this->service = $services;
        $this->validator = $transactionValidator;
    }
    
    /**
     * Create a resource
     *
     * @param  mixed $data
     * @return ApiProblem|mixed
     */
    public function create($data)
    {
        try {
            $this->validator->validate($data);
            return $this->service->sendTransaction($data);
        } catch (Exception $e) {
            $this->service->roolbackTransaction($data);
            return new ApiProblemResponse(new ApiProblem($e->getCode(), utf8_encode($e->getMessage())));
        }
    }
}
