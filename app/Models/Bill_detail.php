<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bill_detail extends Model
{
    protected $table = 'bill_details';
    protected $fillable =
    [
        'bill_id',
        'product_id',
        'quantily',
        'price',
    ];
}
