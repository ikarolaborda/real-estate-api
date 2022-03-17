<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\Input;

use App\Common\Exception\InvalidRequestException;
use App\Query\RealEstateReadQuery;
use Particle\Validator\Validator;
use App\Exceptions\InvalidFilterAggregationException;

class RealEstateReadRequest
{
    public static function fromRealEstateRead(array $input): RealEstateReadQuery
    {
        $validator = new Validator();

        $validator
            ->optional('property_id')
            ->integer()
            ->required(function (array $values) {
                return !array_key_exists('user_id', $values);
            });

        $validator
            ->optional('user_id')
            ->integer()
            ->required(function (array $values) {
                return !array_key_exists('property_id', $values);
            });

        $result = $validator->validate($input);
        if(!$result->isValid()) {
            throw InvalidRequestException::fromValidationResult($result);
        }

        $findPropertyQuery = new RealEstateReadQuery();

        //use of both search parameters at the same time is NOT allowed
        if (isset($input['user_id']) && isset($input['property_id'])) {
            throw new InvalidFilterAggregationException();
        }

        if(isset($input['property_id'])) {
            $findPropertyQuery->setPropertyId((int)$input['property_id']);
            $findPropertyQuery->setUserId(0);
        }

        if(isset($input['user_id'])) {
            $findPropertyQuery->setUserId((int)$input['user_id']);
            $findPropertyQuery->setPropertyId(0);
        }

        return $findPropertyQuery;

    }
}
