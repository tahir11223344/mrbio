<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OfferCard extends Model
{
    protected $fillable = [
        'offer_id',
        'section',
        'section_heading',
        'title',
        'description',
        'image',
        'image_alt',
        'feature_text',
        'sort_order',
    ];

    public function offer()
    {
        return $this->belongsTo(Offer::class, 'offer_id');
    }
}
