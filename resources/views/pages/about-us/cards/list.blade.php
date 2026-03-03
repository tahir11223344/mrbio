<x-default-layout>

    @section('title')
        {{ __('About Page Cards') }}
    @endsection


    <div class="card">
        <!--begin::Card header-->
        <div class="card-header border-0 pt-6">
            <!--begin::Card title-->
            <div class="card-title">
                <!--begin::Search-->
                <div class="d-flex align-items-center position-relative my-1">
                    {!! getIcon('magnifier', 'fs-3 position-absolute ms-5') !!}
                    <input type="text" data-kt-user-table-filter="search"
                        class="form-control form-control-solid w-250px ps-13 pe-10" placeholder="{{ __('Search') }}"
                        id="cardsSearchInput" />
                    <button type="button" class="btn btn-sm btn-icon position-absolute end-0 me-2" id="cardsResetBtn" title="Reset Search" style="display: none;">
                        {!! getIcon('cross', 'fs-3') !!}
                    </button>
                </div>
                <!--end::Search-->
            </div>
            <!--begin::Card title-->

            <!--begin::Card toolbar-->
            <div class="card-toolbar">
                <!--begin::Toolbar-->
                <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
                    <a href="{{ route('admin.about-us.cards.create') }}" class="btn btn-primary">
                        {!! getIcon('plus', 'fs-2', '', 'i') !!}
                        {{ __('Add Cards') }}
                    </a>
                </div>

                <!--end::Toolbar-->
            </div>
            <!--end::Card toolbar-->
        </div>
        <!--end::Card header-->

        <!--begin::Card body-->
        <div class="card-body py-4">
            <div class="table-responsive">
                {{ $dataTable->table() }}
            </div>
        </div>
        <!--end::Card body-->
    </div>


    @push('scripts')
        {{ $dataTable->scripts() }}

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const searchInput = document.getElementById('cardsSearchInput');
                const resetBtn = document.getElementById('cardsResetBtn');

                // Search Filter
                searchInput.addEventListener('keyup', function() {
                    window.LaravelDataTables['aboutuscards-table'].search(this.value).draw();
                    // Show/hide reset button based on input value
                    resetBtn.style.display = this.value ? 'block' : 'none';
                });

                // Reset Search Button
                resetBtn.addEventListener('click', function() {
                    searchInput.value = '';
                    window.LaravelDataTables['aboutuscards-table'].search('').draw();
                    resetBtn.style.display = 'none';
                });
            });
        </script>
    @endpush
</x-default-layout>
