<?php

declare(strict_types=1);

namespace App\Http\Action;

use App\Http\Action\Action;
use Illuminate\Http\Response;

class HealthCheck implements Action
{
    public function __invoke(): Response
    {
        return new Response('OK!');
    }
}
