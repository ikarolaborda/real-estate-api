<?php

declare(strict_types=1);

namespace App\Exceptions;

use App\Common\Exception\DomainException;

class UserNotFoundException extends DomainException
{
    public function __construct()
    {
        parent::__construct(ExceptionTokens::USER_NOT_FOUND);
    }
}
