<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EquipmentCategory extends Model
{
    protected $fillable = [
        'name',
        'url',
        'show_on',
        'sort_number',
    ];

    protected $casts = [
        'sort_number' => 'integer',
    ];
}
