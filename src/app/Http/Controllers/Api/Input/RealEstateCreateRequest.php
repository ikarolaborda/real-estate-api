<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\Input;

use App\Common\Exception\InvalidRequestException;
use App\Exceptions\InvalidPropertyAreaValueException;
use App\Query\RealEstateCreateQuery;
use Particle\Validator;
use App\Exceptions\UserNotFoundException;
use App\Exceptions\UserExceededMaxPropertyNumberException;
use App\Exceptions\InvalidPropertyValueException;
use App\Models\RealEstate;

class RealEstateCreateRequest
{
    public static function fromRealEstateCreate(array $input): RealEstateCreateQuery
    {
        $validator = new Validator\Validator();

        $validator
            ->required('user_id')
            ->integer();
        $validator
            ->required('property_title')
            ->string();
        $validator
            ->optional('property_description')
            ->string();
        $validator
            ->optional('content')
            ->string();
        $validator
            ->required('property_price')
            ->float();
        $validator
            ->required('property_bathrooms')
            ->integer();
        $validator
            ->required('property_rooms')
            ->integer();
        $validator
            ->required('property_area')
            ->integer();
        $validator
            ->required('property_total_area')
            ->integer();
        $validator
            ->required('slug')
            ->string();

        $form = $validator->validate($input);

        if (!$form->isValid()) {
            throw InvalidRequestException::fromValidationResult($form);
        }

        $query = new RealEstateCreateQuery();

        if(isset($input['user_id'])) {
            if(!RealEstate::where('user_id',$input['user_id'])->get()) {
                throw new UserNotFoundException();
            }
            $query->setUserId($input['user_id']);

        }

        if(isset($input['property_title'])) {
            $query->setPropertyTitle($input['property_title']);
        }

        if(isset($input['property_description'])) {
            $query->setPropertyDescription($input['property_description']);
        }

        if(isset($input['content'])) {
            $query->setContent($input['content']);
        }


        if(isset($input['property_price'])) {
            if((float)$input['property_price']< 1) {
                throw new InvalidPropertyValueException();
            }
            $query->setPropertyPrice((float)$input['property_price']);
        }

        if(isset($input['property_bathrooms'])) {
            if($input['property_bathrooms'] < 1) {
                throw new InvalidRequestException(1);
            }
            $query->setPropertyBathrooms($input['property_bathrooms']);
        }

        if(isset($input['property_rooms'])) {
          if($input['property_rooms'] < 1 ) {
              throw new InvalidRequestException(1);
          }
          $query->setPropertyRooms($input['property_rooms']);
        }

        if(isset($input['property_area'])) {
            if((float)$input['property_area']<2) {
                throw new InvalidPropertyAreaValueException(['property_area' => ['cannot be less than 2 square meters']]);
            }
            $query->setPropertyArea($input['property_area']);
        }

        if(isset($input['property_total_area'])) {
            if($input['property_total_area'] < $query->getPropertyArea()) {
                throw new InvalidPropertyAreaValueException(['property_total_area' => ['bigger or equal to property_area']]);
            }
            $query->setPropertyTotalArea($input['property_total_area']);
        }

        if(isset($input['slug'])) {
            $query->setSlug($input['slug']);
        }

        return $query;
    }

}
