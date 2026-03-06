<?php

namespace App\DataTables;

use App\Models\EquipmentCategory;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class EquipmentCategoryDataTable extends DataTable
{
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addIndexColumn()
            ->editColumn('created_at', fn($c) => Carbon::parse($c->created_at)->format('d-M-Y'))
            ->editColumn('updated_at', fn($c) => $c->updated_at ? Carbon::parse($c->updated_at)->format('d-M-Y') : '-')
            ->orderColumn('created_at', 'equipment_categories.created_at $1')
            ->orderColumn('updated_at', 'equipment_categories.updated_at $1')
            ->editColumn('show_on', function ($c) {
                $badges = [
                    'service' => '<span class="badge badge-primary">Service</span>',
                    'rental' => '<span class="badge badge-info">Rental</span>',
                    'both' => '<span class="badge badge-success">Both</span>',
                    'none' => '<span class="badge badge-secondary">None</span>',
                ];
                return $badges[$c->show_on] ?? '-';
            })
            ->addColumn('action', fn($c) => view('pages.equipment-categories.columns._actions', compact('c'))->render())
            ->rawColumns(['action', 'show_on'])
            ->setRowId('id');
    }

    public function query(EquipmentCategory $model): QueryBuilder
    {
        return $model->newQuery()
            ->select('equipment_categories.*')
            ->orderBy('sort_number', 'asc');
    }

    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('equipment-category-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->processing(true)
            ->serverSide(true)
            ->orderBy(4, 'asc')
            ->addTableClass('table table-striped table-row-bordered gy-5 gs-7 border rounded text-gray-700 fw-semibold')
            ->setTableHeadClass('text-start text-muted fw-bold fs-7 text-uppercase gs-0')
            ->drawCallback(
                "function() {
                    if (typeof KTMenu !== 'undefined') {
                        KTMenu.createInstances();
                    }
                }"
            );
    }

    public function getColumns(): array
    {
        return [
            Column::make('DT_RowIndex')
                ->title('#')
                ->searchable(false)
                ->orderable(false)
                ->width(50)
                ->addClass('text-center'),

            Column::make('name')
                ->title(__('Name'))
                ->name('equipment_categories.name'),

            Column::make('url')
                ->title(__('URL'))
                ->name('equipment_categories.url'),

            Column::make('show_on')
                ->title(__('Show On'))
                ->name('equipment_categories.show_on'),

            Column::make('sort_number')
                ->title(__('Sort Number'))
                ->name('equipment_categories.sort_number'),

            Column::make('created_at')
                ->title(__('Created At'))
                ->name('equipment_categories.created_at'),

            Column::make('updated_at')
                ->title(__('Updated At'))
                ->name('equipment_categories.updated_at'),

            Column::computed('action')
                ->title(__('Actions'))
                ->exportable(false)
                ->printable(false)
                ->width(120)
                ->addClass('text-end text-nowrap'),
        ];
    }

    protected function filename(): string
    {
        return 'EquipmentCategory_' . date('YmdHis');
    }
}
