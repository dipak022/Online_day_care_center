<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = [
        'email',
        'phone',
        'detail',
        'facebookb_link',
        'twiter_link',
        'instragram_link',
        'linkdin_link',
        'image',
    ];
}
