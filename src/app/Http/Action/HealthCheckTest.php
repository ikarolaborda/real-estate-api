<?php

declare(strict_types=1);

namespace App\Http\Action;

use PHPUnit\Framework\TestCase;

class HealthCheckTest extends TestCase
{
    public function testIsReturningOk(): void
    {
        $action = new HealthCheck();
        $response = $action();

        $this->assertEquals('OK!', $response->getContent());
    }
}
