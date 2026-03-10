<x-default-layout>

    @section('title')
        {{ __('Offer Cards') }}
    @endsection

    <div class="card">
        <div class="card-header border-0 pt-6">
            <div class="card-title">
                <div class="d-flex align-items-center position-relative my-1">
                    {!! getIcon('magnifier', 'fs-3 position-absolute ms-5') !!}
                    <input type="text" data-kt-user-table-filter="search"
                        class="form-control form-control-solid w-250px ps-13 pe-10" placeholder="{{ __('Search Cards') }}"
                        id="offerCardsSearchInput" />
                    <button type="button" class="btn btn-sm btn-icon position-absolute end-0 me-2" id="offerCardsResetBtn"
                        title="Reset Search" style="display: none;">
                        {!! getIcon('cross', 'fs-3') !!}
                    </button>
                </div>
            </div>

            <div class="card-toolbar">
                <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
                    @can('create offer')
                        <a href="{{ route('admin-offer-cards.create', $offer->id) }}" class="btn btn-primary me-3">
                            {!! getIcon('plus', 'fs-2', '', 'i') !!}
                            {{ __('Add Card') }}
                        </a>
                    @endcan
                    <a href="{{ route('admin-offers.list') }}" class="btn btn-light">
                        {{ __('Back to Offers') }}
                    </a>
                </div>
            </div>
        </div>

        <div class="card-body py-4">
            <div class="table-responsive">
                {{ $dataTable->table() }}
            </div>
        </div>
    </div>

    @push('scripts')
        {{ $dataTable->scripts() }}

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const searchInput = document.getElementById('offerCardsSearchInput');
                const resetBtn = document.getElementById('offerCardsResetBtn');

                searchInput.addEventListener('keyup', function() {
                    window.LaravelDataTables['offer-cards-table'].search(this.value).draw();
                    resetBtn.style.display = this.value ? 'block' : 'none';
                });

                resetBtn.addEventListener('click', function() {
                    searchInput.value = '';
                    window.LaravelDataTables['offer-cards-table'].search('').draw();
                    resetBtn.style.display = 'none';
                });
            });
        </script>
    @endpush
</x-default-layout>
