<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'seeping_id',
        'total',
        'payment_type',
        'status',
        'date',
        'month',
        'year',
    ];

   
}
