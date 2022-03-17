<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\Output;

use App\Models\RealEstate;

class RealEstateReadResponse
{

    /**
     * @param RealEstate[] $properties
     * @return array
     */
    public static function fromRealEstates(array $properties): array
    {
        $responseProperties = [];

        foreach ($properties as $property) {
            $responseProperties['properties'][] = RealEstate::fromRealEstate($property);
        }

        return $responseProperties;
    }
}
