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
    public bool $merge = false;

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
     * @param  string|array  $types  e.g. 'x-ray-repairing' or ['repair-service', 'x-ray-repairing', 'c-arm-repairing']
     * @param  array  $types  Order will be preserved exactly as passed
     * @param  bool  $merge  When true, render a single section with items from all types.
     */
    public function __construct(string|array $types = ['x-ray-repairing', 'c-arm-repairing'], bool $merge = false)
    {
        $this->merge = $merge;
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

        if ($this->merge) {
            $primaryType = $typeList[0] ?? 'repair-service';
            $primaryType = trim(strtolower($primaryType));
            $primaryConfig = $this->typeConfig[$primaryType] ?? $this->typeConfig['repair-service'];

            $headingField = $primaryConfig['fieldPrefix'].'_heading';
            $descField = $primaryConfig['fieldPrefix'].'_short_description';

            $heading = $repairService?->{$headingField} ?? '';
            $description = $repairService?->{$descField} ?? '';

            $items = collect();
            foreach ($typeList as $type) {
                $type = trim(strtolower($type));
                if (! isset($this->typeConfig[$type])) {
                    continue;
                }

                $config = $this->typeConfig[$type];
                $items = $items->merge(
                    RepairServiceSubPage::where('page_category', $config['page_category'])
                        ->where('is_active', true)
                        ->select(['title', 'slug', 'short_description', 'page_category'])
                        ->get()
                );
            }

            if ($items->isNotEmpty() || filled($heading) || filled($description)) {
                $this->sections->push([
                    'type' => $primaryType,
                    'urlSegment' => $primaryConfig['url'],
                    'headingData' => split_heading($heading),
                    'shortDescription' => $description,
                    'items' => $items,
                ]);
            }

            return;
        }

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
        return view('components.repair-service-section', [
            'sections' => $this->sections,
            'merge' => $this->merge,
        ]);
    }
}
