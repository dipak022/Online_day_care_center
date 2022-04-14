<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Delivery_boy extends Model
{
    use HasFactory;

    protected $fillable = [
        'delivery_boy_name',
        'delivery_boy_phone',
        'delivery_boy_password',
        'delivery_boy_status',
    ];


}
