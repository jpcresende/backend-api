<?php

namespace picpay\V1\Rest\Transaction\Service;

use stdClass;

interface AbstractServiceInterface
{
    public function sendTransaction(stdClass $data): array;
    public function roolbackTransaction(stdClass $data);
}
