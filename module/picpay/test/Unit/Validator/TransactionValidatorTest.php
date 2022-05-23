<?php

declare(strict_types=1);

namespace PicpayTest\Unit\Exception;

use Laminas\Stdlib\ArrayUtils;
use Laminas\Test\PHPUnit\Controller\AbstractHttpControllerTestCase;
use stdClass;

class TransactionValidatorTest extends AbstractHttpControllerTestCase
{
    private $class;

    public function setUp(): void
    {
        // The module configuration should still be applicable for tests.
        // You can override configuration here with test case specific values,
        // such as sample view templates, path stacks, module_listener_options,
        // etc.
        $configOverrides = [
            'module_listener_options' => [
                'config_cache_enabled' => false,
            ],
        ];

        $this->setApplicationConfig(ArrayUtils::merge(
            include __DIR__ . '/../../../../../config/application.config.php',
            $configOverrides
        ));

        parent::setUp();

        $this->class = $this->getApplication()->getServiceManager()->get('Transaction\Validator\TransactionValidator');
    }

    public function testValidateSuccess()
    {
        $objParams = new stdClass();
        $objParams->payer = 1;
        $objParams->payee = 2;
        $objParams->value = 100.00;
        $returnValidate = $this->class->validate($objParams);
        $this->assertNull($returnValidate);
    }
}
