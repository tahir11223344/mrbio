<x-default-layout>
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow-sm">
                <div class="card-header p-5 rounded-top">
                    <div class="d-flex w-100 justify-content-between align-items-center">
                        @if (isset($data->id) && !empty($data->id))
                            <h3 class="fw-bolder mb-0">{{ __('Edit Offer Card') }}</h3>
                        @else
                            <h3 class="fw-bolder mb-0">{{ __('Create Offer Card') }}</h3>
                        @endif
                        <a href="{{ route('admin-offer-cards.list', $offer->id) }}" class="btn btn-light btn-md">
                            <i class="bi bi-arrow-left me-2"></i>{{ __('Back to Offer Cards') }}
                        </a>
                    </div>
                </div>

                @php
                    $url = isset($data->id)
                        ? route('admin-offer-cards.update', [$offer->id, $data->id])
                        : route('admin-offer-cards.store', $offer->id);
                @endphp

                <div class="card-body p-5">
                    <form action="{{ $url }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @if (isset($data->id))
                            @method('PUT')
                        @endif
                        <div class="row">
                            <div class="col-lg-6 mb-4">
                                <label for="section" class="form-label fw-semibold required">{{ __('Section') }}</label>
                                <select id="section" name="section"
                                    class="form-select form-select-lg @error('section') is-invalid @enderror" required>
                                    <option value="">{{ __('Select Section') }}</option>
                                    <option value="billing-services"
                                        {{ old('section', $data->section ?? '') == 'billing-services' ? 'selected' : '' }}>
                                        {{ __('IT & Medical Billing Services') }}
                                    </option>
                                    <option value="services"
                                        {{ old('section', $data->section ?? '') == 'services' ? 'selected' : '' }}>
                                        {{ __('Product Portfolios') }}
                                    </option>
                                </select>
                                @error('section')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-lg-6 mb-4">
                                <label for="section_heading" class="form-label fw-semibold">{{ __('Section Heading') }}</label>
                                <input type="text" id="section_heading" name="section_heading"
                                    class="form-control form-control-lg @error('section_heading') is-invalid @enderror"
                                    value="{{ old('section_heading', $data->section_heading ?? '') }}">
                                @error('section_heading')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-lg-6 mb-4">
                                <label for="title" class="form-label fw-semibold required">{{ __('Card Title') }}</label>
                                <input type="text" id="title" name="title"
                                    class="form-control form-control-lg @error('title') is-invalid @enderror"
                                    value="{{ old('title', $data->title ?? '') }}" required>
                                @error('title')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-lg-6 mb-4">
                                <label for="sort_order" class="form-label fw-semibold">{{ __('Sort Order') }}</label>
                                <input type="number" id="sort_order" name="sort_order"
                                    class="form-control form-control-lg @error('sort_order') is-invalid @enderror"
                                    value="{{ old('sort_order', $data->sort_order ?? 0) }}" min="0">
                                @error('sort_order')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-lg-12 mb-4">
                                <label for="description" class="form-label fw-semibold">{{ __('Description') }}</label>
                                <textarea id="description" name="description"
                                    data-upload-url="{{ route('ckeditor.upload') }}?_token={{ csrf_token() }}&dir=offers/cards/ckeditor"
                                    data-ckeditor="true"
                                    class="form-control form-control-lg @error('description') is-invalid @enderror" rows="4">{{ old('description', $data->description ?? '') }}</textarea>
                                @error('description')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-lg-12 mb-4" id="feature-groups-wrapper">
                                <label class="form-label fw-semibold">{{ __('Feature Groups') }}</label>
                                @php
                                    $featureGroups = old('feature_groups', $data->feature_groups ?? []);
                                @endphp
                                <div class="feature-groups-list">
                                    @forelse ($featureGroups as $groupIndex => $group)
                                        <div class="border rounded-3 p-3 mb-3 feature-group-item" data-index="{{ $groupIndex }}">
                                            <div class="d-flex justify-content-between align-items-center mb-2">
                                                <strong>{{ __('Feature') }}</strong>
                                                <button type="button" class="btn btn-light btn-sm remove-feature-group">
                                                    {{ __('Remove') }}
                                                </button>
                                            </div>
                                            <input type="text"
                                                name="feature_groups[{{ $groupIndex }}][title]"
                                                class="form-control form-control-lg mb-3"
                                                value="{{ $group['title'] ?? '' }}"
                                                placeholder="{{ __('Feature Title') }}">
                                            <div class="feature-items-list">
                                                @php $items = $group['items'] ?? ['']; @endphp
                                                @foreach ($items as $itemIndex => $item)
                                                    <div class="d-flex gap-3 align-items-center mb-2 feature-item-row">
                                                        <input type="text"
                                                            name="feature_groups[{{ $groupIndex }}][items][]"
                                                            class="form-control form-control-lg"
                                                            value="{{ $item }}"
                                                            placeholder="{{ __('Subfeature') }}">
                                                        <button type="button" class="btn btn-light btn-sm remove-feature-item" {{ $itemIndex === 0 ? 'disabled' : '' }}>
                                                            {{ __('Remove') }}
                                                        </button>
                                                    </div>
                                                @endforeach
                                            </div>
                                            <button type="button" class="btn btn-sm btn-primary add-feature-item">
                                                {{ __('Add Subfeature') }}
                                            </button>
                                        </div>
                                    @empty
                                    @endforelse
                                </div>
                                <button type="button" class="btn btn-sm btn-primary" id="add-feature-group">
                                    {{ __('Add Feature') }}
                                </button>
                                @error('feature_groups')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                                @error('feature_groups.*.title')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                                @error('feature_groups.*.items.*')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-lg-6 mb-4">
                                <label for="image" class="form-label fw-semibold">{{ __('Card Image') }}</label>
                                <input type="file" id="image" name="image"
                                    class="form-control form-control-lg @error('image') is-invalid @enderror">
                                @if (isset($data->image) && $data->image)
                                    <div class="mt-2" id="offer-card-image-block">
                                        <img src="{{ asset('storage/offers/cards/' . $data->image) }}" alt="Card"
                                            class="img-thumbnail" width="100">
                                        <button type="button" class="btn btn-sm btn-light-danger ms-2"
                                            id="remove-offer-card-image">
                                            {{ __('Remove') }}
                                        </button>
                                    </div>
                                @endif
                                @error('image')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-lg-6 mb-4">
                                <label for="image_alt" class="form-label fw-semibold">{{ __('Image Alt') }}</label>
                                <input type="text" id="image_alt" name="image_alt"
                                    class="form-control form-control-lg @error('image_alt') is-invalid @enderror"
                                    value="{{ old('image_alt', $data->image_alt ?? '') }}">
                                @error('image_alt')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="d-flex justify-content-end mt-4">
                            <button type="submit" class="btn btn-primary">
                                @include('partials/general/_button-indicator', [
                                    'label' => isset($data->id) ? 'Update' : 'Create',
                                ])
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script src="{{ asset('assets/js/custom/blog-editor.js') }}?v={{ filemtime(public_path('assets/js/custom/blog-editor.js')) }}"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const sectionSelect = document.getElementById('section');
                const featureWrapper = document.getElementById('feature-groups-wrapper');
                const list = featureWrapper?.querySelector('.feature-groups-list');
                const addButton = document.getElementById('add-feature-group');

                function toggleFeatureTexts() {
                    if (!sectionSelect || !featureWrapper) return;
                    featureWrapper.style.display = sectionSelect.value === 'billing-services' ? '' : 'none';
                }

                function addFeatureGroup() {
                    if (!list) return;
                    const index = list.children.length;
                    const group = document.createElement('div');
                    group.className = 'border rounded-3 p-3 mb-3 feature-group-item';
                    group.dataset.index = index;
                    group.innerHTML = `
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <strong>{{ __('Feature') }}</strong>
                            <button type="button" class="btn btn-light btn-sm remove-feature-group">{{ __('Remove') }}</button>
                        </div>
                        <input type="text" name="feature_groups[${index}][title]" class="form-control form-control-lg mb-3" placeholder="{{ __('Feature Title') }}">
                        <div class="feature-items-list">
                            <div class="d-flex gap-3 align-items-center mb-2 feature-item-row">
                                <input type="text" name="feature_groups[${index}][items][]" class="form-control form-control-lg" placeholder="{{ __('Subfeature') }}">
                                <button type="button" class="btn btn-light btn-sm remove-feature-item" disabled>{{ __('Remove') }}</button>
                            </div>
                        </div>
                        <button type="button" class="btn btn-sm btn-primary add-feature-item">{{ __('Add Subfeature') }}</button>
                    `;
                    list.appendChild(group);
                }

                if (addButton) {
                    addButton.addEventListener('click', function() {
                        addFeatureGroup();
                    });
                }

                if (list) {
                    list.addEventListener('click', function(event) {
                        const target = event.target;
                        if (target.classList.contains('remove-feature-group')) {
                            const group = target.closest('.feature-group-item');
                            if (group) {
                                group.remove();
                            }
                        }

                        if (target.classList.contains('add-feature-item')) {
                            const group = target.closest('.feature-group-item');
                            const itemsList = group?.querySelector('.feature-items-list');
                            if (!itemsList) return;

                            const groupIndex = group.dataset.index;
                            const row = document.createElement('div');
                            row.className = 'd-flex gap-3 align-items-center mb-2 feature-item-row';
                            row.innerHTML = `
                                <input type="text" name="feature_groups[${groupIndex}][items][]" class="form-control form-control-lg" placeholder="{{ __('Subfeature') }}">
                                <button type="button" class="btn btn-light btn-sm remove-feature-item">{{ __('Remove') }}</button>
                            `;
                            itemsList.appendChild(row);
                        }

                        if (target.classList.contains('remove-feature-item')) {
                            const row = target.closest('.feature-item-row');
                            const itemsList = target.closest('.feature-items-list');
                            if (row && itemsList && itemsList.children.length > 1) {
                                row.remove();
                            }
                        }
                    });
                }

                if (sectionSelect) {
                    sectionSelect.addEventListener('change', toggleFeatureTexts);
                }

                if (list && !list.children.length) {
                    addFeatureGroup();
                }

                toggleFeatureTexts();
            });
        </script>
        @if (isset($data->id) && !empty($data->image))
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const removeBtn = document.getElementById('remove-offer-card-image');
                    if (!removeBtn) return;

                    removeBtn.addEventListener('click', function() {
                        if (!confirm('Remove this image?')) {
                            return;
                        }

                        fetch("{{ route('admin-offer-cards.remove-image', $offer->id) }}", {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': "{{ csrf_token() }}",
                            },
                            body: JSON.stringify({
                                card_id: "{{ $data->id }}",
                            })
                        })
                            .then(response => response.json())
                            .then(data => {
                                if (data.success) {
                                    const block = document.getElementById('offer-card-image-block');
                                    if (block) {
                                        block.remove();
                                    }
                                }
                            })
                            .catch(error => console.error(error));
                    });
                });
            </script>
        @endif
    @endpush
</x-default-layout>
