<div id="product-list">
    <div class="row g-4 justify-content-center">
        @foreach ($products as $product)
            @php
                $gallery = [];
                if (is_string($product->gallery_images)) {
                    $decoded = json_decode($product->gallery_images, true);
                    $gallery = is_array($decoded) ? $decoded : [];
                } elseif (is_array($product->gallery_images)) {
                    $gallery = $product->gallery_images;
                }

                $allImages = [];
                if ($product->thumbnail) {
                    $allImages[] = 'products/thumbnails/' . $product->thumbnail;
                }
                foreach ($gallery as $img) {
                    $allImages[] = 'products/gallery/' . $img;
                }
            @endphp

            <div class="col-12 row g-4 align-items-start">
                <div class="col-12 product-heading">
                    <h3 class="product-name">{!! highlightBracketText($product->name ?? '') !!}</h3>
                </div>

                <div class="col-lg-6 col-md-6 product-image order-2 order-md-2">
                    <div class="product-section">
                        <div class="img-wrapper position-relative">
                            <img src="{{ asset('storage/products/thumbnails/' . $product->thumbnail) }}"
                                class="img-fluid rental-img mainProductImg active-img"
                                alt="{{ $product->image_alt ?? '' }}">
                            <button class="btn-overlay">Get For Rent</button>
                        </div>

                        <div class="img-dots mt-3 text-center">
                            @foreach ($allImages as $index => $imgPath)
                                <span class="dot {{ $index == 0 ? 'active' : '' }}"
                                    data-img="{{ asset('storage/' . $imgPath) }}"></span>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-md-6 product-text order-3 order-md-1">
                    <p class="product-desc">
                        {!! $product->description !!}
                    </p>

                    <div class="d-flex gap-3 btn-wrraper">
                        <button class="btn-service" data-open-form>
                            <i class="bi bi-gear"></i>
                            <span class="btn-label" data-slug="{{ $product->slug ?? '' }}">Get Service</span>
                        </button>

                        <a href="tel:{{ cleanPhone(setting('phone')) }}">
                            <button class="btn-call">
                                <i class="bi bi-telephone"></i>
                                <span class="btn-label">Call Us</span>
                            </button>
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

@if ($products->count() > 0)
    <div class="mt-4">
        {{ $products->links('vendor.pagination.simple-default') }}
    </div>
@endif
