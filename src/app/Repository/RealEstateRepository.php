<?php

declare(strict_types=1);

namespace App\Repository;

use App\Models\RealEstate;
use App\Query\RealEstateCreateQuery;
use App\Query\RealEstateReadQuery;
use Illuminate\Support\Facades\DB;
use App\Exceptions\InvalidPropertyValueException;
use App\Exceptions\InvalidPropertyAreaValueException;
use App\Exceptions\PropertyNotFoundException;
use App\Exceptions\PropertyCategoryNotFoundException;
use App\Exceptions\UserNotFoundException;
use App\Exceptions\UserExceededMaxPropertyNumberException;

class RealEstateRepository
{
    private RealEstate $realEstate;

    public function __construct(RealEstate $realEstate)
    {
        $this->realEstate = $realEstate;
    }

    public function createProperty(RealEstateCreateQuery $query): RealEstate
    {
        //I plan to update this function in the future, in order to use raw queries instead of magic methods.
        $this->realEstate->user_id = $query->getUserId();
        $this->realEstate->property_title = $query->getPropertyTitle();
        $this->realEstate->property_description = $query->getPropertyDescription();
        $this->realEstate->content = $query->getContent();
        $this->realEstate->property_price = $query->getPropertyPrice();
        $this->realEstate->property_bathrooms = $query->getPropertyBathrooms();
        $this->realEstate->property_rooms = $query->getPropertyRooms();
        $this->realEstate->property_area = $query->getPropertyArea();
        $this->realEstate->property_total_area = $query->getPropertyTotalArea();
        $this->realEstate->slug = $query->getSlug();

        $this->realEstate->save();
        return $this->realEstate->refresh();

    }

    /**
     * @return RealEstate[]
     * @throws PropertyNotFoundException
     */
    public function retrievePropertyById(RealEstateReadQuery $readQuery): ?array
    {
        try {
            if($readQuery->getUserId() != null) {
                return $this->realEstate->where('user_id', $readQuery->getUserId())->get()->all();
            }else {
                return $this->realEstate->where('id', $readQuery->getPropertyId())->get()->all();
            }

        }catch (PropertyNotFoundException $pnf) {
            throw new PropertyNotFoundException();
        }
    }
}
