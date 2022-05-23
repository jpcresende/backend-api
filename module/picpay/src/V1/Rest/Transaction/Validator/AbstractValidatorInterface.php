<?php

namespace picpay\V1\Rest\Transaction\Validator;

use stdClass;

interface AbstractValidatorInterface
{
    public function validate(stdClass $data);
}
