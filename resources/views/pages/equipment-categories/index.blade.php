<x-default-layout>

    @section('title')
        {{ __('Equipment Categories') }}
    @endsection

    <div class="card">
        <div class="card-header border-0 pt-6">
            <div class="card-title">
                <div class="d-flex align-items-center position-relative my-1">
                    {!! getIcon('magnifier', 'fs-3 position-absolute ms-5') !!}
                    <input type="text" data-kt-user-table-filter="search"
                        class="form-control form-control-solid w-250px ps-13 pe-10" placeholder="{{ __('Search Equipment Category') }}"
                        id="equipmentCategorySearchInput" />
                    <button type="button" class="btn btn-sm btn-icon position-absolute end-0 me-2" id="equipmentCategoryResetBtn" title="Reset Search" style="display: none;">
                        {!! getIcon('cross', 'fs-3') !!}
                    </button>
                </div>
            </div>

            <div class="card-toolbar">
                <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#kt_modal_add_equipment_category">
                        {!! getIcon('plus', 'fs-2', '', 'i') !!}
                        {{ __('Add Equipment Category') }}
                    </button>
                </div>
            </div>
        </div>

        <div class="card-body py-4">
            <div class="table-responsive">
                {{ $dataTable->table() }}
            </div>
        </div>
    </div>

    <!-- Add Modal -->
    <div class="modal fade" id="kt_modal_add_equipment_category" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered mw-650px">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="fw-bold mb-0">{{ __('Add Equipment Category') }}</h2>
                    <button type="button" class="btn btn-sm btn-icon" data-bs-dismiss="modal">
                        {!! getIcon('cross', 'fs-2') !!}
                    </button>
                </div>

                <div class="modal-body px-5 py-4">
                    <form id="addEquipmentCategoryForm">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label required">{{ __('Name') }}</label>
                            <input type="text" name="name" class="form-control"
                                placeholder="{{ __('Enter Equipment Name') }}">
                            <div class="text-danger mt-1 error-message" data-error-for="name"></div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">{{ __('URL') }}</label>
                            <input type="text" name="url" class="form-control"
                                placeholder="{{ __('Enter URL (optional)') }}">
                            <div class="text-danger mt-1 error-message" data-error-for="url"></div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label required">{{ __('Show On') }}</label>
                            <select name="show_on" class="form-control form-select">
                                <option value="both">{{ __('Both (Service & Rental)') }}</option>
                                <option value="service">{{ __('Service Only') }}</option>
                                <option value="rental">{{ __('Rental Only') }}</option>
                                <option value="none">{{ __('None') }}</option>
                            </select>
                            <div class="text-danger mt-1 error-message" data-error-for="show_on"></div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label required">{{ __('Sort Number') }}</label>
                            <input type="number" name="sort_number" class="form-control" value="0" min="0"
                                placeholder="{{ __('Enter Sort Number') }}">
                            <small class="form-text text-muted">
                                Lower numbers appear first. You can use 0 to {{ $nextAllowedSort ?? 1 }}.
                            </small>
                            <div class="text-danger mt-1 error-message" data-error-for="sort_number"></div>
                        </div>

                        <div class="text-end pt-4">
                            <button type="button" class="btn btn-light me-2" data-bs-dismiss="modal">
                                {{ __('Discard') }}
                            </button>
                            <button type="submit" class="btn btn-primary">
                                @include('partials/general/_button-indicator', ['label' => __('Submit')])
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Modal -->
    <div class="modal fade" id="kt_modal_edit_equipment_category" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered mw-650px">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="fw-bold mb-0">{{ __('Edit Equipment Category') }}</h2>
                    <button type="button" class="btn btn-sm btn-icon" data-bs-dismiss="modal">
                        {!! getIcon('cross', 'fs-2') !!}
                    </button>
                </div>

                <div class="modal-body px-5 py-4">
                    <form id="editEquipmentCategoryForm">
                        @csrf
                        <input type="hidden" name="id" id="edit_equipment_category_id">

                        <div class="mb-3">
                            <label class="form-label required">{{ __('Name') }}</label>
                            <input type="text" name="name" id="edit_name" class="form-control">
                            <div class="text-danger mt-1 error-message" data-error-for="edit_name"></div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">{{ __('URL') }}</label>
                            <input type="text" name="url" id="edit_url" class="form-control">
                            <div class="text-danger mt-1 error-message" data-error-for="edit_url"></div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label required">{{ __('Show On') }}</label>
                            <select name="show_on" id="edit_show_on" class="form-control form-select">
                                <option value="both">{{ __('Both (Service & Rental)') }}</option>
                                <option value="service">{{ __('Service Only') }}</option>
                                <option value="rental">{{ __('Rental Only') }}</option>
                                <option value="none">{{ __('None') }}</option>
                            </select>
                            <div class="text-danger mt-1 error-message" data-error-for="edit_show_on"></div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label required">{{ __('Sort Number') }}</label>
                            <input type="number" name="sort_number" id="edit_sort_number" class="form-control" min="0">
                            <small class="form-text text-muted">
                                Lower numbers appear first. Maximum allowed: {{ $nextAllowedSort ?? 1 }}.
                            </small>
                            <div class="text-danger mt-1 error-message" data-error-for="edit_sort_number"></div>
                        </div>

                        <div class="text-end pt-4">
                            <button type="button" class="btn btn-light me-2" data-bs-dismiss="modal">
                                {{ __('Discard') }}
                            </button>
                            <button type="submit" class="btn btn-primary">
                                @include('partials/general/_button-indicator', ['label' => __('Update')])
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        {{ $dataTable->scripts() }}

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const searchInput = document.getElementById('equipmentCategorySearchInput');
                const resetBtn = document.getElementById('equipmentCategoryResetBtn');

                searchInput.addEventListener('keyup', function() {
                    window.LaravelDataTables['equipment-category-table'].search(this.value).draw();
                    resetBtn.style.display = this.value ? 'block' : 'none';
                });

                resetBtn.addEventListener('click', function() {
                    searchInput.value = '';
                    window.LaravelDataTables['equipment-category-table'].search('').draw();
                    resetBtn.style.display = 'none';
                });
            });
        </script>

        <script>
            const updateUrlTemplate = "{{ route('equipment-categories.update', ['id' => ':id']) }}";
            const deleteUrlTemplate = "{{ route('equipment-categories.destroy', ['id' => ':id']) }}";

            document.addEventListener("DOMContentLoaded", function() {
                function getCsrfToken() {
                    const meta = document.querySelector('meta[name="csrf-token"]');
                    if (meta) return meta.getAttribute('content');
                    const input = document.querySelector('input[name="_token"]');
                    return input ? input.value : '';
                }

                const csrfToken = getCsrfToken();
                const addForm = document.getElementById('addEquipmentCategoryForm');
                const editForm = document.getElementById('editEquipmentCategoryForm');
                const addModalEl = document.getElementById('kt_modal_add_equipment_category');
                const editModalEl = document.getElementById('kt_modal_edit_equipment_category');

                function clearErrors(form) {
                    if (!form) return;
                    form.querySelectorAll('.error-message').forEach(el => el.innerHTML = '');
                    form.querySelectorAll('.is-invalid').forEach(el => el.classList.remove('is-invalid'));
                }

                function showValidationErrors(form, errors) {
                    if (!form || !errors) return;
                    Object.keys(errors).forEach(key => {
                        const msg = Array.isArray(errors[key]) ? errors[key][0] : errors[key];
                        const candidates = [key, `edit_${key}`];
                        let errorEl = null;
                        for (let c of candidates) {
                            errorEl = form.querySelector(`[data-error-for="${c}"]`);
                            if (errorEl) break;
                        }
                        if (errorEl) errorEl.innerHTML = msg;
                        let input = form.querySelector(`[name="${key}"]`) || form.querySelector(`#edit_${key}`);
                        if (input) input.classList.add('is-invalid');
                    });
                }

                function reloadTable() {
                    try {
                        if (window.LaravelDataTables && window.LaravelDataTables['equipment-category-table']) {
                            window.LaravelDataTables['equipment-category-table'].ajax.reload(null, false);
                        }
                    } catch (err) {
                        console.error('reloadTable error:', err);
                    }
                }

                function setupModalReset(modalEl, formEl) {
                    if (!modalEl || !formEl) return;
                    modalEl.addEventListener('hidden.bs.modal', function() {
                        formEl.reset();
                        clearErrors(formEl);
                    });
                }
                setupModalReset(addModalEl, addForm);
                setupModalReset(editModalEl, editForm);

                // CREATE
                if (addForm) {
                    addForm.addEventListener('submit', function(e) {
                        e.preventDefault();
                        clearErrors(addForm);
                        const fd = new FormData(addForm);

                        fetch(`{{ route('equipment-categories.store') }}`, {
                                method: 'POST',
                                headers: {
                                    'X-CSRF-TOKEN': csrfToken
                                },
                                body: fd
                            })
                            .then(async res => {
                                const json = await res.json().catch(() => null);
                                if (!res.ok) {
                                    if (res.status === 422 && json && json.errors) {
                                        showValidationErrors(addForm, json.errors);
                                        return;
                                    }
                                    throw {
                                        res,
                                        json
                                    };
                                }
                                reloadTable();
                                if (json && json.message) toastr.success(json.message);
                                const bs = bootstrap.Modal.getInstance(addModalEl);
                                if (bs) bs.hide();
                            })
                            .catch(err => {
                                console.error('Create failed:', err);
                                toastr.error('An error occurred while creating equipment category.');
                            });
                    });
                }

                // OPEN EDIT
                document.addEventListener('click', function(e) {
                    const btn = e.target.closest('.edit-equipment-category-btn, [data-action="edit-equipment-category"]');
                    if (!btn) return;
                    if (!editForm) return;

                    const id = btn.dataset.id;
                    const name = btn.dataset.name || '';
                    const url = btn.dataset.url || '';
                    const showOn = btn.dataset.showOn || 'both';
                    const sortNumber = btn.dataset.sortNumber || '0';

                    editForm.querySelector('#edit_equipment_category_id').value = id || '';
                    editForm.querySelector('#edit_name').value = name;
                    editForm.querySelector('#edit_url').value = url;
                    editForm.querySelector('#edit_show_on').value = showOn;
                    editForm.querySelector('#edit_sort_number').value = sortNumber;

                    clearErrors(editForm);
                    bootstrap.Modal.getOrCreateInstance(editModalEl).show();
                });

                // UPDATE
                if (editForm) {
                    editForm.addEventListener('submit', function(e) {
                        e.preventDefault();
                        clearErrors(editForm);

                        const id = editForm.querySelector('#edit_equipment_category_id').value;
                        if (!id) {
                            toastr.error('ID missing. Cannot update.');
                            return;
                        }

                        const fd = new FormData(editForm);
                        const updateUrl = updateUrlTemplate.replace(':id', id);

                        fetch(updateUrl, {
                                method: 'POST',
                                headers: {
                                    'X-CSRF-TOKEN': csrfToken,
                                    'X-HTTP-Method-Override': 'PUT'
                                },
                                body: fd
                            })
                            .then(async res => {
                                const json = await res.json().catch(() => null);
                                if (!res.ok) {
                                    if (res.status === 422 && json && json.errors) {
                                        showValidationErrors(editForm, json.errors);
                                        return;
                                    }
                                    throw {
                                        res,
                                        json
                                    };
                                }
                                reloadTable();
                                if (json && json.message) toastr.success(json.message);
                                const bs = bootstrap.Modal.getInstance(editModalEl);
                                if (bs) bs.hide();
                            })
                            .catch(err => {
                                console.error('Update failed:', err);
                                toastr.error('An error occurred while updating equipment category.');
                            });
                    });
                }

                // DELETE
                document.addEventListener('click', function(e) {
                    const btn = e.target.closest('[data-kt-action="delete_equipment_category"]');
                    if (!btn) return;
                    e.preventDefault();

                    const id = btn.dataset.ktEquipmentCategoryId || btn.dataset.id;
                    if (!id) {
                        toastr.error('ID missing. Cannot delete.');
                        return;
                    }
                    const deleteUrl = deleteUrlTemplate.replace(':id', id);

                    Swal.fire({
                        title: 'Are you sure?',
                        text: 'This action cannot be undone',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonText: 'Yes, delete it!',
                        cancelButtonText: 'Cancel'
                    }).then(result => {
                        if (!result.isConfirmed) return;
                        fetch(deleteUrl, {
                                method: 'POST',
                                headers: {
                                    'X-CSRF-TOKEN': csrfToken,
                                    'X-HTTP-Method-Override': 'DELETE'
                                }
                            })
                            .then(async res => {
                                const json = await res.json().catch(() => null);
                                if (!res.ok) throw {
                                    res,
                                    json
                                };
                                if (json && json.success) {
                                    reloadTable();
                                    if (json.message) toastr.success(json.message);
                                } else {
                                    toastr.error(json && json.message ? json.message : 'Delete failed.');
                                }
                            })
                            .catch(err => {
                                console.error('Delete failed:', err);
                                toastr.error('An error occurred while deleting equipment category.');
                            });
                    });
                });
            });
        </script>
    @endpush

</x-default-layout>
