<?php

declare(strict_types=1);

namespace App\Http\Action;

use App\Common\Exception\InvalidRequestException;
use App\Exceptions\PropertyNotFoundException;
use App\Http\Controllers\Api\Input\RealEstateReadRequest;
use App\Http\Controllers\Api\Output\RealEstateCreateResponse;
use App\Http\Controllers\Api\Output\RealEstateReadResponse;
use App\Http\Controllers\Api\Service\RealEstateCreateService;
use App\Repository\RealEstateRepository;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Api\Input\RealEstateCreateRequest;
use App\Exceptions\UserNotFoundException;
use Illuminate\Support\Js;

class RealEstateRead implements Action
{
    private RealEstateRepository $repository;

    public function __construct(RealEstateRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @throws InvalidRequestException
     * @throws UserNotFoundException
     * @throws PropertyNotFoundException
     */
    public function __invoke(Request $request):JsonResponse
    {
        $query = RealEstateReadRequest::fromRealEstateRead($request->all());
        $realEstates = $this->repository->retrievePropertyById($query);
        return new JsonResponse(RealEstateReadResponse::fromRealEstates($realEstates));
    }

}
