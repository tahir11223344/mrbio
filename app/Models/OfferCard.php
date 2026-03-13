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
        'feature_texts',
        'feature_groups',
        'sort_order',
    ];

    protected $casts = [
        'feature_texts' => 'array',
        'feature_groups' => 'array',
    ];

    public function offer()
    {
        return $this->belongsTo(Offer::class, 'offer_id');
    }
}
