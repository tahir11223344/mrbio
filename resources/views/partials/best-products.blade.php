<style>
    .buy-form-overlay {
        background-color:
    }
</style>

@if ($products->count())
    @foreach ($products as $product)
        <div class="col-lg-3 col-md-6 animate-card">
            <div class="product-card">

                @if ($product->discount_percent > 0)
                    <span class="discount-badge">{{ $product->discount_percent }}% OFF</span>
                @endif

                <img src="{{ asset('storage/products/thumbnails/' . $product->thumbnail) }}"
                    alt="{{ $product->image_alt }}" class="product-img img-fluid">

                <h4 class="product-title">{{ $product->name }}</h4>
                <p class="product-desc">{{ $product->short_description }}</p>

                <div class="price-box d-flex justify-content-between">
                    @if (!empty($product->price) && $product->price > 0)
                        <span class="old-price">${{ number_format($product->price) }}</span>
                    @endif
                    <span class="new-price">${{ number_format($product->sale_price) }}</span>
                    <button class="buy-btn" data-open-form>Get A Quote</button>
                </div>
            </div>
        </div>
    @endforeach
@else
    <div class="col-12 text-center py-5">
        <p class="text-muted">No products found.</p>
    </div>
@endif


<div class="buy-form-overlay" id="buyFormOverlay">
    <div class="buy-form-box">
        <span class="close-form text-danger">&times;</span>

        <h3>Buy <span>Service</span> </h3>

        <form class="buy-form">
            <input type="text" placeholder="Full Name" required>
            <input type="email" placeholder="Email Address" required>

            <select required>
                <option value="">Select City</option>
                <option>Dallas</option>
                <option>Houston</option>
            </select>

            <select required>
                <option value="">Select State</option>
                <option>Texas</option>
                <option>California</option>
            </select>

            <select required>
                <option value="">Select Service</option>
                <option>Repair</option>
                <option>Rental</option>
            </select>

            <textarea placeholder="Message"></textarea>

            <button type="submit" class="submit-btn">Submit</button>
        </form>
    </div>
</div>
