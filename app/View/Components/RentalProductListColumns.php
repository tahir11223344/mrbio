<?php

namespace App\View\Components;

use App\Models\EquipmentCategory;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class RentalProductListColumns extends Component
{
    public $productColumns;
    public $type;

    public function __construct($type = 'rental')
    {
        $this->type = $type;
        
        // Determine which show_on values to include
        $showOnValues = match($type) {
            'rental' => ['rental', 'both'],
            'service' => ['service', 'both'],
            default => ['both']
        };

        $equipmentCategories = EquipmentCategory::whereIn('show_on', $showOnValues)
            ->orderBy('sort_number', 'asc')
            ->orderBy('name', 'asc')
            ->get();

        $this->productColumns = $equipmentCategories->chunk(ceil($equipmentCategories->count() / 3));
    }

    public function render(): View|Closure|string
    {
        return view('components.rental-product-list-columns');
    }
}

