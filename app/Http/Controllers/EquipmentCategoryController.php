<?php

namespace App\Http\Controllers;

use App\DataTables\EquipmentCategoryDataTable;
use App\Models\EquipmentCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EquipmentCategoryController extends Controller
{
    public function index(EquipmentCategoryDataTable $dataTable)
    {
        $maxSortNumber = EquipmentCategory::max('sort_number') ?? 0;
        $nextAllowedSort = $maxSortNumber + 1;
        
        return $dataTable->render('pages.equipment-categories.index', compact('maxSortNumber', 'nextAllowedSort'));
    }

    public function store(Request $request)
    {
        // Get current max sort number
        $maxSortNumber = EquipmentCategory::max('sort_number') ?? 0;
        $nextAllowedSort = $maxSortNumber + 1;

        $validator = Validator::make($request->all(), [
            'name'        => 'required|string|max:255',
            'url'         => 'nullable|string|max:255',
            'show_on'     => 'required|in:service,rental,both,none',
            'sort_number' => [
                'required',
                'integer',
                'min:0',
                function ($attribute, $value, $fail) use ($nextAllowedSort) {
                    if ($value > $nextAllowedSort) {
                        $fail("Sort number cannot be greater than {$nextAllowedSort}. Current maximum is " . ($nextAllowedSort - 1) . ".");
                    }
                },
            ],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()
            ], 422);
        }

        EquipmentCategory::create([
            'name'        => $request->name,
            'url'         => $request->url,
            'show_on'     => $request->show_on,
            'sort_number' => $request->sort_number,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Equipment Category created successfully'
        ]);
    }

    public function update(Request $request, $id)
    {
        try {
            $equipmentCategory = EquipmentCategory::findOrFail($id);
            
            // Get current max sort number (excluding current record)
            $maxSortNumber = EquipmentCategory::where('id', '!=', $id)->max('sort_number') ?? 0;
            $nextAllowedSort = $maxSortNumber + 1;
            
            $validator = Validator::make($request->all(), [
                'name'        => 'required|string|max:255',
                'url'         => 'nullable|string|max:255',
                'show_on'     => 'required|in:service,rental,both,none',
                'sort_number' => [
                    'required',
                    'integer',
                    'min:0',
                    function ($attribute, $value, $fail) use ($nextAllowedSort) {
                        if ($value > $nextAllowedSort) {
                            $fail("Sort number cannot be greater than {$nextAllowedSort}. Current maximum is " . ($nextAllowedSort - 1) . ".");
                        }
                    },
                ],
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'errors'  => $validator->errors(),
                ], 422);
            }

            $equipmentCategory->update([
                'name'        => $request->name,
                'url'         => $request->url,
                'show_on'     => $request->show_on,
                'sort_number' => $request->sort_number,
            ]);

            return response()->json([
                'success' => true,
                'message' => __('Equipment Category updated successfully.'),
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => __('Something went wrong while updating the equipment category.'),
                'error'   => $e->getMessage(),
            ], 500);
        }
    }

    public function destroy($id)
    {
        try {
            $equipmentCategory = EquipmentCategory::findOrFail($id);
            $equipmentCategory->delete();

            return response()->json([
                'success' => true,
                'message' => __('Equipment Category deleted successfully.'),
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => __('Something went wrong while deleting the equipment category.'),
                'error'   => $e->getMessage(),
            ], 500);
        }
    }
}
