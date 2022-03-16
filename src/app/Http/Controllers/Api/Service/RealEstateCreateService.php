<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\Service;

use App\Repository\RealEstateRepository;
use App\Query\RealEstateCreateQuery;
use App\Models\RealEstate;

class RealEstateCreateService
{
    private RealEstateRepository $repository;

    public function __construct(RealEstateRepository $repository)
    {
        $this->repository = $repository;
    }

    public function createFrom(RealEstateCreateQuery $createQuery): RealEstate
    {
        return $this->repository->createProperty($createQuery);
    }
}
