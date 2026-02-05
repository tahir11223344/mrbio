<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceRequest extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'company',
        'service',
        'categories', // JSON
        'message',
        'looking_for',
        'preferred_contact',
    ];

    protected $casts = [
        'categories' => 'array', // automatically cast JSON to array
    ];
}
