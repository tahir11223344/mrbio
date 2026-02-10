<style>
    /* Swiper container & slide */
    .oemSwiper {
        width: 100%;
    }

    .oemSwiper .swiper-slide {
        width: 100% !important;
        /* full width for 1 card */
        display: flex;
        justify-content: center;
    }
</style>

<section class="oem-trust-section py-5">
    <div class="container">
        <h2 class="text-center mb-5 section-title fade-left">Why OEMs Trust <span>Mr.Biomed Tech Services</span></h2>

        <!-- Desktop / Laptop Grid -->
        <div class="row g-4 justify-content-center d-none d-lg-flex">
            @foreach ($oems as $item)
                <div class="col-lg-4 col-md-6 animate-card">
                    <div class="oem-card">
                        <div class="oem-img-box">
                            <img src="{{ asset('storage/oem_contents/' . $item->image) }}"
                                alt="{{ $item->image_alt ?? '' }}" class="oem-img img-fluid">
                            <h4 class="oem-card-title">{{ $item->title ?? '' }}</h4>
                        </div>
                        <div class="oem-desc">{!! $item->description !!}</div>
                    </div>
                </div>
            @endforeach

            <div class="text-center mt-">
                <a href="{{ route('contact-us') }}">
                    <button class="btn-lgg">Talk to Expert</button>
                </a>
            </div>
        </div>

        <!-- Mobile / Tablet Slider -->
        <div class="swiper oemSwiper d-lg-none">
            <div class="swiper-wrapper">
                @foreach ($oems as $item)
                    <div class="swiper-slide">
                        <div class="oem-card">
                            <div class="oem-img-box">
                                <img src="{{ asset('storage/oem_contents/' . $item->image) }}"
                                    alt="{{ $item->image_alt ?? '' }}" class="oem-img img-fluid">
                                <h4 class="oem-card-title">{{ $item->title ?? '' }}</h4>
                            </div>
                            <div class="oem-desc">{!! $item->description !!}</div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="text-center mt-">
                <a href="{{ route('contact-us') }}">
                    <button class="btn-lgg">Talk to Expert</button>
                </a>
            </div>
        </div>


    </div>
</section>

<!-- Swiper JS -->

<script></script>
