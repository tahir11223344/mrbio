<x-default-layout>

    @section('title')
        {{ __('Reviews') }}
    @endsection


    <div class="card">
        <div class="card-header border-0 pt-6">
            <div class="card-title">
                <div class="d-flex align-items-center position-relative my-1">
                    {!! getIcon('magnifier', 'fs-3 position-absolute ms-5') !!}
                    <input type="text" data-kt-user-table-filter="search"
                        class="form-control form-control-solid w-250px ps-13 pe-10" placeholder="{{ __('Search') }}"
                        id="reviewsSearchInput" />
                    <button type="button" class="btn btn-sm btn-icon position-absolute end-0 me-2" id="reviewsResetBtn" title="Reset Search" style="display: none;">
                        {!! getIcon('cross', 'fs-3') !!}
                    </button>
                </div>
            </div>

            <div class="card-toolbar">
                <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
                    {{-- <a href="#" class="btn btn-primary">
                        {!! getIcon('plus', 'fs-2', '', 'i') !!}
                        {{ __('Add Comment') }}
                    </a> --}}
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
                const searchInput = document.getElementById('reviewsSearchInput');
                const resetBtn = document.getElementById('reviewsResetBtn');

                // Search Filter
                searchInput.addEventListener('keyup', function() {
                    window.LaravelDataTables['reviews-table'].search(this.value).draw();
                    // Show/hide reset button based on input value
                    resetBtn.style.display = this.value ? 'block' : 'none';
                });

                // Reset Search Button
                resetBtn.addEventListener('click', function() {
                    searchInput.value = '';
                    window.LaravelDataTables['reviews-table'].search('').draw();
                    resetBtn.style.display = 'none';
                });
            });
        </script>
    @endpush
</x-default-layout>
