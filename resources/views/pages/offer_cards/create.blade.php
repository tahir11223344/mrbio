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
                                        {{ __('IT & Billing Services') }}
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
                                    class="form-control form-control-lg @error('description') is-invalid @enderror" rows="4">{{ old('description', $data->description ?? '') }}</textarea>
                                @error('description')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-lg-12 mb-4" id="feature-texts-wrapper">
                                <label class="form-label fw-semibold">{{ __('Feature Texts') }}</label>
                                @php
                                    $featureTexts = old('feature_texts', $data->feature_texts ?? ($data->feature_text ? [$data->feature_text] : ['']));
                                @endphp
                                <div class="feature-texts-list">
                                    @foreach ($featureTexts as $index => $text)
                                        <div class="d-flex gap-3 align-items-center mb-2 feature-text-row">
                                            <input type="text" name="feature_texts[]"
                                                class="form-control form-control-lg"
                                                value="{{ $text }}">
                                            <button type="button" class="btn btn-light btn-sm remove-feature-text" {{ $index === 0 ? 'disabled' : '' }}>
                                                {{ __('Remove') }}
                                            </button>
                                        </div>
                                    @endforeach
                                </div>
                                <button type="button" class="btn btn-sm btn-primary" id="add-feature-text">
                                    {{ __('Add Feature') }}
                                </button>
                                @error('feature_texts')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                                @error('feature_texts.*')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-lg-6 mb-4">
                                <label for="image" class="form-label fw-semibold">{{ __('Card Image') }}</label>
                                <input type="file" id="image" name="image"
                                    class="form-control form-control-lg @error('image') is-invalid @enderror">
                                @if (isset($data->image) && $data->image)
                                    <img src="{{ asset('storage/offers/cards/' . $data->image) }}" alt="Card"
                                        class="img-thumbnail mt-2" width="100">
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
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const sectionSelect = document.getElementById('section');
                const featureWrapper = document.getElementById('feature-texts-wrapper');
                const list = featureWrapper?.querySelector('.feature-texts-list');
                const addButton = document.getElementById('add-feature-text');

                function toggleFeatureTexts() {
                    if (!sectionSelect || !featureWrapper) return;
                    featureWrapper.style.display = sectionSelect.value === 'billing-services' ? '' : 'none';
                }

                function addFeatureRow(value = '') {
                    if (!list) return;
                    const row = document.createElement('div');
                    row.className = 'd-flex gap-3 align-items-center mb-2 feature-text-row';
                    row.innerHTML = `
                        <input type="text" name="feature_texts[]" class="form-control form-control-lg" value="${value}">
                        <button type="button" class="btn btn-light btn-sm remove-feature-text">{{ __('Remove') }}</button>
                    `;
                    list.appendChild(row);
                }

                if (addButton) {
                    addButton.addEventListener('click', function() {
                        addFeatureRow();
                    });
                }

                if (list) {
                    list.addEventListener('click', function(event) {
                        const target = event.target;
                        if (target.classList.contains('remove-feature-text')) {
                            const row = target.closest('.feature-text-row');
                            if (row && list.children.length > 1) {
                                row.remove();
                            }
                        }
                    });
                }

                if (sectionSelect) {
                    sectionSelect.addEventListener('change', toggleFeatureTexts);
                }

                toggleFeatureTexts();
            });
        </script>
    @endpush
</x-default-layout>
