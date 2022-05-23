<?php

declare(strict_types=1);

namespace PicpayTest\Unit\Exception;

use DomainException;
use Laminas\Stdlib\ArrayUtils;
use Laminas\Test\PHPUnit\Controller\AbstractHttpControllerTestCase;

class ExternalServiceNotAuthorizingExceptionTest extends AbstractHttpControllerTestCase
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

        $this->class = $this->getApplication()->getServiceManager()->get('Transaction\Exception\ExternalServiceNotAuthorizingException');
    }

    public function testThrowsAlwaysThrowDomainImplements()
    {
        $this->expectException(DomainException::class);
        $this->class::throwException();
    }

    public function testThrowsAlwaysThrowFileNotFoundExceptionWithMsgContainsFilename ()
    {
        $this->expectException(DomainException::class);
        $this->expectExceptionMessage(sprintf($this->class::MESSAGE));
        $this->class::throwException();

    }
}
