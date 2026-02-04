<?php

namespace App\View\Components;

use App\Models\RepairService;
use App\Models\RepairServiceSubPage;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Illuminate\View\Component;

class RepairServiceSection extends Component
{
    public Collection $sections;

    /**
     * Central config:
     * - fieldPrefix   → RepairService table fields
     * - page_category → RepairServiceSubPage table
     * - url           → frontend URL segment
     */
    private array $typeConfig = [
        'repair-service' => [
            'fieldPrefix' => 'repair_service',
            'page_category' => 'repair-service',
            'url' => 'repairing-services',
        ],
        'x-ray-repairing' => [
            'fieldPrefix' => 'x_ray',
            'page_category' => 'x-ray-repairing', // ✅ DB MATCH
            'url' => 'x-ray-repairing',
        ],
        'c-arm-repairing' => [
            'fieldPrefix' => 'c_arm',
            'page_category' => 'c-arm-repairing', // ✅ DB MATCH
            'url' => 'c-arm-repairing',
        ],
    ];

    /**
     * @param  string|array  $types  e.g. 'x-ray-repairing' or ['x-ray-repairing', 'c-arm-repairing', 'repairing']
     * @param  array  $types  Order will be preserved exactly as passed
     */
    public function __construct(string|array $types = ['x-ray-repairing', 'c-arm-repairing'])
    {
        $typeList = is_string($types) ? [$types] : ($types ?? ['x-ray-repairing', 'c-arm-repairing']);

        // Sab relevant columns select kar lo ek baar
        $repairService = RepairService::select([
            'repair_service_heading',
            'repair_service_short_description',
            'x_ray_heading',
            'x_ray_short_description',
            'c_arm_heading',
            'c_arm_short_description',
        ])->first();

        $this->sections = collect();

        foreach ($typeList as $type) {

            $type = trim(strtolower($type));

            // Safety check
            if (! isset($this->typeConfig[$type])) {
                continue;
            }

            $config = $this->typeConfig[$type];

            $headingField = $config['fieldPrefix'].'_heading';
            $descField = $config['fieldPrefix'].'_short_description';

            $heading = $repairService?->{$headingField} ?? '';
            $description = $repairService?->{$descField} ?? '';

            $items = RepairServiceSubPage::where('page_category', $config['page_category'])
                ->where('is_active', true)
                ->select(['title', 'slug', 'short_description'])
                ->get();

            // Push section only if something exists
            if ($items->isNotEmpty() || filled($heading) || filled($description)) {
                $this->sections->push([
                    'type' => $type,
                    'urlSegment' => $config['url'],
                    'headingData' => split_heading($heading),
                    'shortDescription' => $description,
                    'items' => $items,
                ]);
            }
        }
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.repair-service-section');
    }
}
