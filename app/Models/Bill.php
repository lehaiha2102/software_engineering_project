<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    protected $table = 'bills';
    protected $fillable =
    [
        'customer_id',
        'date_order',
        'total',
        'note',
        'status',
    ];
}
