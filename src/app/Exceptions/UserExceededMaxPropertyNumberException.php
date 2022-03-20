<?php

declare(strict_types=1);

namespace App\Exceptions;

use App\Common\Exception\DomainException;

class UserExceededMaxPropertyNumberException extends DomainException
{
    public function __construct()
    {
        parent::__construct(ExceptionTokens::USER_EXCEEDED_MAX_PROPERTY_NUMBER);
    }
}
