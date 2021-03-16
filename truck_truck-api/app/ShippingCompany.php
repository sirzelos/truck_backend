<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShippingCompany extends Model
{
    protected $fillable = [
        'user_id',
        'oil_cost', 'mini_weight', 'north_mini_weight_cost',
        'bangkok_mini_weight_cost','east_mini_weight_cost',
        'west_mini_weight_cost','northeast_mini_weight_cost',
        'central_mini_weight_cost','product_type'
    ];
}
