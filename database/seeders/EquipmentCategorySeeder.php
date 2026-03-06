<?php

namespace Database\Seeders;

use App\Models\EquipmentCategory;
use Illuminate\Database\Seeder;

class EquipmentCategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name' => 'Patient Monitors', 'url' => null, 'show_on' => 'both', 'sort_number' => 1],
            ['name' => 'Defibrillators', 'url' => null, 'show_on' => 'both', 'sort_number' => 2],
            ['name' => 'Infusion Pumps', 'url' => null, 'show_on' => 'rental', 'sort_number' => 3],
            ['name' => 'Ventilators', 'url' => null, 'show_on' => 'both', 'sort_number' => 4],
            ['name' => 'Ultrasound Machines', 'url' => null, 'show_on' => 'service', 'sort_number' => 5],
            ['name' => 'ECG Machines', 'url' => null, 'show_on' => 'both', 'sort_number' => 6],
            ['name' => 'Surgical Tables', 'url' => null, 'show_on' => 'rental', 'sort_number' => 7],
            ['name' => 'Anesthesia Machines', 'url' => null, 'show_on' => 'both', 'sort_number' => 8],
            ['name' => 'X-Ray Equipment', 'url' => null, 'show_on' => 'service', 'sort_number' => 9],
        ];

        foreach ($categories as $category) {
            EquipmentCategory::create($category);
        }
    }
}
