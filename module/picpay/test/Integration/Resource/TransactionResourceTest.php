<?php

declare(strict_types=1);

namespace PicpayTest\Integration\Resource;

use Laminas\Stdlib\ArrayUtils;
use Laminas\Test\PHPUnit\Controller\AbstractHttpControllerTestCase;

class TransactionResourceTest extends AbstractHttpControllerTestCase
{
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
    }

    /**
     * @group testCreateTransactionForbiddenFail
     *
     */
    public function testCreateTransactionForbiddenFail()
    {
        $this->dispatch('/api/transaction', 'POST', ["value" => 100.00, "payer" => 1, "payee" => 2]);
        $this->assertResponseStatusCode(403);
        $this->assertModuleName('rest');
        $this->assertControllerClass('restcontroller');
        $this->assertMatchedRouteName('picpay.rest.transaction');
    }

    /**
     * @group testInvalidRouteDoesNotCrash
     *
     */
    public function testInvalidRouteDoesNotCrash()
    {
        $this->dispatch('/invalid/route', 'GET');
        $this->assertResponseStatusCode(404);
    }
}
