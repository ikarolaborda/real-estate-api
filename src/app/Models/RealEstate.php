<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RealEstate extends Model
{
    protected $table = 'real_estate';

    protected $fillable = [
        'user_id',
        'property_title',
        'property_description',
        'content',
        'property_price',
        'property_bathrooms',
        'property_rooms',
        'property_area',
        'property_total_area',
        'slug'
    ];

    use HasFactory;

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @param RealEstate $realEstate
     * @return array
     * Uses the model as a Data Transfer Object
     */
    public static function fromRealEstate(RealEstate $realEstate): array
    {
        return [
            'user_id' => $realEstate->user_id,
            'property_title' => $realEstate->property_title,
            'property_description' => $realEstate->property_description,
            'content' => $realEstate->content,
            'property_price' => $realEstate->property_price,
            'property_bathrooms' => $realEstate->property_bathrooms,
            'property_rooms' => $realEstate->property_rooms,
            'property_area' => $realEstate->property_area,
            'property_total_area' => $realEstate->property_total_area,
            'slug' => $realEstate->slug
        ];
    }


}
