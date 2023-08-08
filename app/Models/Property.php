<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Property extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title', 'slug', 'headline', 'experience', 'sale', 'rent', 'category', 'type',
        'sale_price', 'rent_price', 'tribute', 'condominium', 'description', 'bedrooms',
        'suites', 'bathrooms', 'rooms', 'garage', 'garage_covered', 'area_total', 'area_util',
        'zipcode', 'street', 'number', 'complement', 'neighborhood', 'state', 'city', 'air_conditioning',
        'bar', 'library', 'barbecue_grill', 'american_kitchen', 'fitted_kitchen', 'pantry', 'shed',
        'office', 'bathtub', 'fireplace', 'lavatory', 'furnished', 'pool', 'steam_room', 'view_of_the_sea',
        'status', 'views', 'user_id', 'agency_id'
    ];
}
