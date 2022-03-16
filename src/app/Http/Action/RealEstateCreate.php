<?php

declare(strict_types=1);

namespace App\Http\Action;

use App\Common\Exception\InvalidRequestException;
use App\Http\Controllers\Api\Output\RealEstateCreateResponse;
use App\Http\Controllers\Api\Service\RealEstateCreateService;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Api\Input\RealEstateCreateRequest;
use App\Exceptions\UserNotFoundException;
use Illuminate\Support\Js;

class RealEstateCreate implements Action
{
    private RealEstateCreateService $service;

    public function __construct(RealEstateCreateService $service)
    {
        $this->service = $service;
    }

    /**
     * @throws InvalidRequestException
     * @throws UserNotFoundException
     */
    public function __invoke(Request $request):JsonResponse
    {
        $query = RealEstateCreateRequest::fromRealEstateCreate($request->all());
        $property = $this->service->createFrom($query);

        return new JsonResponse(RealEstateCreateResponse::fromRealEstate($property));
    }

}
