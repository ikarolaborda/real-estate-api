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


}
