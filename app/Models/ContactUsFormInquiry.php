<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactUsFormInquiry extends Model
{

    protected $table = 'contact_us_form_inquiries';

    protected $fillable = [
        'name',
        'email',
        'state_id',
        'city_id',
        'service',
        'message',
    ];
}
