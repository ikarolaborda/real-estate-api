<?php

declare(strict_types=1);

namespace App\Exceptions;

abstract class ExceptionTokens
{
    //Wide use Constants
    public const ENTITY_NOT_FOUND = 'ENTITY_NOT_FOUND';
    public const AN_ERROR_HAS_OCCURRED = 'AN_ERROR_HAS_OCCURRED';
    public const INVALID_REQUEST = 'INVALID_REQUEST';
    public const INVALID_EXCEPTION_TOKEN = 'INVALID_EXCEPTION_TOKEN';

    //Specific Token Domain Exceptions
    const PROPERTY_NOT_FOUND = 'PROPERTY_NOT_FOUND';
    const USER_NOT_FOUND = 'USER_NOT_FOUND';
    const INVALID_PROPERTY_VALUE = 'INVALID_PROPERTY_VALUE';
    const INVALID_PROPERTY_AREA_VALUE = 'INVALID_PROPERTY_AREA_VALUE';
    const PROPERTY_CATEGORY_NOT_FOUND = 'PROPERTY_CATEGORY_NOT_FOUND';
    const USER_EXCEEDED_MAX_PROPERTY_NUMBER = 'USER_EXCEEDED_MAX_PROPERTY_NUMBER';

}
