<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\Output;

use App\Models\RealEstate;

class RealEstateCreateResponse
{
    public static function fromRealEstate(RealEstate $realEstate): array
    {
        return  RealEstate::fromRealEstate($realEstate);
    }
}
