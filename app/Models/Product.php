<?php

namespace App\Models;

use App\Casts\MoneyCast;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int id
 * @property string title
 * @property string description
 * @property \App\Values\Money price
 */
class Product extends Model
{
    protected $guarded = [];

    protected $casts = [
        'price' => MoneyCast::class,
    ];

    protected $hidden = ['created_at', 'updated_at'];
}
