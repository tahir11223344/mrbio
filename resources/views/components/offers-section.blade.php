@if (isset($offers) && $offers->count() > 0)
    <section class="offer-section mt-5">
        <div class="container">

            <!-- Heading -->
            <h2 class="text-center offer-title">What We <span>Offer</span></h2>
            <p class="text-center offer-desc mb-5">
                We provide top-quality medical equipment & services to meet all your healthcare needs.
            </p>

            <!-- Slider Wrapper -->
            <div class="offer-slider-wrapper position-relative">

                <!-- Prev Button -->
                <button class="offer-prev"><i class="bi bi-chevron-left"></i></button>

                <!-- Slider Container -->
                <div class="offer-slider-container">
                    <div class="offer-slider-track">

                        @foreach ($offers as $offer)
                            <div class="offer-card">
                                <img src="{{ asset('storage/offers/thumbnails/' . $offer->thumbnail) }}"
                                    alt="{{ $offer->image_alt ?? '' }}" class="card-img img-fluid">

                                <h4 class="card-title">{{ $offer->title }}</h4>
                                <hr>
                                <p class="card-desc">{{ $offer->short_description }}</p>
                                <button class="read-btn">Read More</button>
                            </div>
                        @endforeach

                    </div>
                </div>

                <!-- Next Button -->
                <button class="offer-next"><i class="bi bi-chevron-right"></i></button>

                <!-- Pagination -->
                <div class="offer-pagination"></div>
            </div>

        </div>
    </section>
@endif
