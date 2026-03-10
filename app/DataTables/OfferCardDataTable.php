<?php

namespace App\DataTables;

use App\Models\Offer;
use App\Models\OfferCard;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class OfferCardDataTable extends DataTable
{
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addIndexColumn()
            ->editColumn('section', function ($card) {
                return $card->section === 'billing-services'
                    ? 'IT & Medical Billing Services'
                    : 'Product Portfolios';
            })
            ->editColumn('image', function ($card) {
                if (!$card->image) {
                    return '-';
                }

                $url = asset('storage/offers/cards/' . $card->image);

                return '<img src="' . $url . '" alt="Card" width="60" height="60" style="object-fit: cover; border-radius: 5px;">';
            })
            ->editColumn('created_at', fn($card) => Carbon::parse($card->created_at)->format('d-M-Y'))
            ->editColumn('updated_at', fn($card) => $card->updated_at ? Carbon::parse($card->updated_at)->format('d-M-Y') : '-')
            ->orderColumn('created_at', 'offer_cards.created_at $1')
            ->orderColumn('updated_at', 'offer_cards.updated_at $1')
            ->addColumn('action', fn($card) => view('pages.offer_cards._actions', compact('card'))->render())
            ->rawColumns(['action', 'image'])
            ->setRowId('id');
    }

    public function query(OfferCard $model): QueryBuilder
    {
        $offer = request()->route('offer');
        $offerId = $offer instanceof Offer ? $offer->id : $offer;

        return $model->newQuery()->where('offer_id', $offerId);
    }

    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('offer-cards-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->processing(true)
            ->serverSide(true)
            ->orderBy(6, 'desc')
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

            Column::make('section')->title('Section'),
            Column::make('section_heading')->title('Section Heading'),
            Column::make('title')->title('Title'),
            Column::make('sort_order')->title('Order'),
            Column::make('image')->title('Image')->searchable(false)->orderable(false),
            Column::make('created_at')->title('Created At'),

            Column::computed('action')
                ->title('Actions')
                ->exportable(false)
                ->printable(false)
                ->width(120)
                ->addClass('text-center'),
        ];
    }

    protected function filename(): string
    {
        return 'OfferCards_' . date('YmdHis');
    }
}
