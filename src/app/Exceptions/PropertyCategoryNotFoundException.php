<?php

declare(strict_types=1);

namespace App\Exceptions;

use App\Common\Exception\DomainException;

class PropertyCategoryNotFoundException extends DomainException
{
    public function __construct()
    {
        parent::__construct(ExceptionTokens::PROPERTY_CATEGORY_NOT_FOUND);
    }
}
