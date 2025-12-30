@if (isset($offers) && $offers->count() > 0)
    <section class="offer-section mt-5">
        <div class="container">

            <!-- Heading -->
            <h2 class="text-center offer-title fade-left">What We <span>Offer</span></h2>
            <p class="text-center offer-desc mb-5 fade-right">
                We provide top-quality medical equipment & services to meet all your healthcare needs.
            </p>

            <!-- Slider Wrapper -->
            <div class="offer-slider-wrapper position-relative ">

                <!-- Prev Button -->
                <button class="offer-prev"><i class="bi bi-chevron-left"></i></button>

                <!-- Slider Container -->
                <div class="offer-slider-container">
                    <div class="offer-slider-track">

                        @foreach ($offers as $offer)
                            <div class="offer-card">
                                <img src="{{ $offer->thumbnail ? asset('storage/offers/thumbnails/' . $offer->thumbnail) : '' }}"
                                    alt="{{ $offer->image_alt ?? '' }}" class="card-img img-fluid">

                                <h4 class="card-title">{{ $offer->title }}</h4>
                                <hr>
                                <p class="card-desc">
                                    {{ \Illuminate\Support\Str::limit($offer->short_description, 110) }}</p>
                                <a href="{{ route('offer.detail', $offer->slug) }}">
                                    <button class="readd-btn">Read More</button>
                                </a>
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
