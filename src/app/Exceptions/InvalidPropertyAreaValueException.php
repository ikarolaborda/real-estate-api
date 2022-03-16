<?php

declare(strict_types=1);

namespace App\Exceptions;

use App\Common\Exception\DomainException;

class InvalidPropertyAreaValueException extends DomainException
{
    public function __construct()
    {
        parent::__construct(ExceptionTokens::INVALID_PROPERTY_AREA_VALUE);
    }
}
