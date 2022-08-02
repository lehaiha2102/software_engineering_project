<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    protected $fillable =
    [
        'ProductName',
        'ProductSlug',
        'ProductUnit',
        'ProductImage',
        'ProductPurchasePrice',
        'ProductPrice',
        'ProductPromotionPrice',
        'CategoryId',
        'ProductCondition',
    ];
}
