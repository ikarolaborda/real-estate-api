<?php

declare(strict_types=1);

namespace App\Exceptions;

use App\Common\Exception\DomainException;

class PropertyNotFoundException extends DomainException
{
    public function __construct()
    {
        parent::__construct(ExceptionTokens::PROPERTY_NOT_FOUND);
    }
}
