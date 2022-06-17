<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;
    protected $fillable = [
        'plan_id',
        'stripe_product_id',
        'name',
        'slug',
        'stripe_plan',
        'price',
        'description',
        'characteristic'
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
