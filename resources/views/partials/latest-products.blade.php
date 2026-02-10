 @if ($products->count())
     @foreach ($products as $product)
         <div class="col-lg-3 col-md-6 col-sm-12 animate-card">
             <div class="custom-card shadow-sm position-relative d-flex flex-column">
                 @if ($product->discount_percent > 0)
                     <span class="discount-badge">{{ $product->discount_percent }}% OFF</span>
                 @endif

                 <div class="card-image-box">
                     @if ($product->thumbnail)
                         <img src="{{ asset('storage/products/thumbnails/' . $product->thumbnail) }}"
                             alt="{{ $product->image_alt ?? '' }}" class="img-fluid card-img-top">
                     @else
                         <!-- placeholder if no image -->
                         <div class="placeholder-img"></div>
                     @endif
                 </div>

                 <div class="card-content-box mt-auto d-flex flex-column justify-content-between p-3">
                     <div>
                         <div class="rating-stars mb-2">
                             <i class="fas fa-star text-warning"></i>
                             <i class="fas fa-star text-warning"></i>
                             <i class="fas fa-star text-warning"></i>
                             <i class="fas fa-star text-warning"></i>
                             <i class="fas fa-star text-warning"></i>
                         </div>
                         <h5 class="product-title fw-bold">{!! plainBracketText($product->name ?? '') !!}</h5>
                         <p class="card-text small mb-2">
                             {{ \Illuminate\Support\Str::limit($product->short_description ?? '', 35) }}</p>
                     </div>

                     <div class="price-action-row d-flex justify-content-between align-items-center mt-3">
                         @if (!empty($product->price) && $product->price > 0)
                             <span
                                 class="old-price text-decoration-line-through text-muted small">${{ number_format($product->price) }}</span>
                         @endif
                         @if (!empty($product->sale_price) && $product->sale_price > 0)
                             <span
                                 class="new-price fw-bolder fs-5 text-primary">${{ number_format($product->sale_price) }}</span>
                         @endif
                         <a href="javascript:void(0)" class="btn buy-now-btn btn-sm"
                             data-slug="{{ $product->slug ?? '' }}" data-open-form>Get A Quote</a>
                     </div>
                 </div>
             </div>


         </div>
     @endforeach
 @else
     <div class="col-12 text-center py-5">
         <p class="text-muted">No products found.</p>
     </div>
 @endif
