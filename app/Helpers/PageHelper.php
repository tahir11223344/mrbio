<?php

namespace App\Helpers;

class PageHelper
{
    public static function labels(): array
    {
        return [
            'landing' => 'Landing Page',
            'service' => 'Service Page',
            'blog'    => 'Blog',
            'repair'  => 'Repair Page',
        ];
    }
}
