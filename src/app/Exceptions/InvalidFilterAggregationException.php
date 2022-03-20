<?php

declare(strict_types=1);

namespace App\Exceptions;

use App\Common\Exception\DomainException;

class InvalidFilterAggregationException extends DomainException
{
    public function __construct(array $errors = [])
    {
        parent::__construct(ExceptionTokens::INVALID_FILTER_AGGREGATION,
            400,
            \App\Common\Exception\ExceptionTokens::AN_ERROR_HAS_OCCURRED,
            $errors
        );
    }
}
