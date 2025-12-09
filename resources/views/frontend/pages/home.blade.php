@extends('frontend.layouts.frontend')

@section('title', 'Home')

@push('frontend-styles')
    <style>
        .image-dots .dot {
            width: 12px;
            height: 12px;
            background: #888;
            border-radius: 50%;
            display: inline-block;
            margin: 0 6px;
            cursor: pointer;
            transition: 0.3s;
        }

        .image-dots .dot.active {
            background: #006A9E;
            transform: scale(1.2);
        }
    </style>
@endpush

@php
    $heading = split_heading($data?->hero_heading ?? '');
    $c = split_heading($data?->content_heading ?? '');
    $x_ray = split_heading($repairServiceData?->x_ray_heading ?? '');
    $c_arm = split_heading($repairServiceData?->c_arm_heading ?? '');
@endphp

@section('frontend-content')


    <section class="hero-section py-5">
        <div class="container">
            <div class="row align-items-center">

                <!-- LEFT COLUMN -->
                <div class="col-lg-6 text-white">

                    <!-- Heading -->
                    <h1 class="hero-heading fade-left">
                        {{ $heading['first_text'] }} <span> {{ $heading['second_text'] }}</span>
                    </h1>

                    <!-- Paragraph -->
                    <p class="hero-para mt-3 fade-right">
                        {{ $data->hero_sd ?? '' }}
                    </p>

                    <!-- Images + Customer Count -->
                    <div class="d-flex align-items-center mt-">
                        <!-- Stacked Images -->
                        <div class="stack-images position-relative" style="width: 160px; height: 70px;">
                            <!-- Image Containers -->
                            <div class="hero-img img-1">
                                <img src="{{ asset('frontend/images/hero-img-1.jpg') }}" alt="Hero 1">

                            </div>
                            <div class="hero-img img-2">
                                <img src="{{ asset('frontend/images/hero-img-2.jpg') }}" alt="Hero 1">
                            </div>
                            <div class="hero-img img-3">
                                <img src="{{ asset('frontend/images/hero-img-3.jpg') }}" alt="Hero 1">
                            </div>
                            <div class="hero-img img-4">
                                <img src="{{ asset('frontend/images/hero-img-4.jpg') }}" alt="Hero 1">
                            </div>
                        </div>

                        <!-- Customer Count -->
                        <div class="ms-5">
                            <h6 class="customer-count">100k+</h6>
                            <p class="customer-text">Satisfied Customers</p>
                        </div>
                    </div>


                    <!-- Buttons -->
                    <div class="mt-5 d-flex align-items-center gap-4">

                        <!-- Service Request -->
                        <div class="d-flex align-items-center gap-2">
                            <i class="bi bi-key" id="service-icon"></i>
                            <button class="hero-btn">Service Request</button>
                        </div>

                        <!-- Login -->
                        <div class="d-flex align-items-center gap-2">
                            <i class="bi bi-person-fill" id="login-icon"></i>
                            <button class="hero-btn">Medrad Login</button>
                        </div>

                    </div>


                </div>

                <!-- RIGHT COLUMN -->
                <div class="col-lg-6 mt-5 mt-lg-0 text-center">
                    <div class="slider-container">
                        <div class="slider-track">

                            {{-- Clone last slide at start --}}
                            @if (!empty($data->hero_slider_images))
                                <div class="slide">
                                    <img src="{{ asset('storage/landing-page/hero-slider/' . collect($data->hero_slider_images)->last()) }}"
                                        class="slider-img">
                                </div>
                            @endif

                            {{-- Actual Slides --}}
                            @foreach ($data->hero_slider_images as $img)
                                <div class="slide">
                                    <img src="{{ asset('storage/landing-page/hero-slider/' . $img) }}" class="slider-img">
                                </div>
                            @endforeach

                            {{-- Clone first slide at end --}}
                            @if (!empty($data->hero_slider_images))
                                <div class="slide">
                                    <img src="{{ asset('storage/landing-page/hero-slider/' . collect($data->hero_slider_images)->first()) }}"
                                        class="slider-img">
                                </div>
                            @endif

                        </div>


                    </div>
                </div>

            </div>
        </div>
    </section>

    <section class="info-section py-5">
        <div class="container">
            <div class="row align-items-stretch">
                <!-- LEFT COLUMN -->
                <div class="col-lg-6 col-md-6 ">
                    <h2 class="info-heading">{{ $c['first_text'] }} <span>{{ $c['second_text'] }}</span> </h2>

                    <p class="info-para">
                        {!! $data->content_description !!}
                    </p>


                    <button class="read-btn mt-3">Read More</button>
                </div>

                <!-- RIGHT COLUMN (Image) -->
                <div class="col-lg-6 col-md-6 mt-4 mt-lg-0 text-center">

                    <div class="image-slider-wrapper">
                        <div class="image-slide-track">

                            @if (!empty($data->content_slider_images))
                                @foreach ($data->content_slider_images as $img)
                                    <div class="image-slide-item">
                                        <img src="{{ asset('storage/landing-page/content-slider/' . $img) }}"
                                            alt="{{ $data->content_image_alt }}" class="info-img img-fluid">
                                    </div>
                                @endforeach
                            @endif

                            {{-- <div class="image-slide-item">
                                <img src="{{ asset('frontend/images/medical-img.jpg') }}" class="info-img img-fluid">
                            </div>

                            <div class="image-slide-item">
                                <img src="{{ asset('frontend/images/medical-img.jpg') }}" class="info-img img-fluid">
                            </div>

                            <div class="image-slide-item">
                                <img src="{{ asset('frontend/images/medical-img.jpg') }}" class="info-img img-fluid">
                            </div> --}}

                        </div>
                    </div>

                    <!-- Dots -->
                    <div class="image-dots text-center mt-3">
                        <span class="dot active" data-index="0"></span>
                        <span class="dot" data-index="1"></span>
                        <span class="dot" data-index="2"></span>
                        <span class="dot" data-index="3"></span>
                    </div>

                </div>

            </div>
        </div>
    </section>
    <section class="features-section
                        py-5">
        <div class="container">
            <div class="row text-white">

                <!-- Feature 1 -->
                <div
                    class="col-lg-3 col-md-6 col-12 mb-4 d-flex align-items-start justify-content-lg-start justify-content-center text-lg-start text-center">
                    <i class="bi bi-truck feature-icon"></i>
                    <div class="ms-3">
                        <h5 class="fw-bol mt-2">Free Shipping</h5>
                        <p class="small mb-0">Order over $600</p>
                    </div>
                </div>

                <!-- Feature 2 -->
                <div
                    class="col-lg-3 col-md-6 col-12 mb-4 d-flex align-items-start justify-content-lg-start justify-content-center text-lg-start text-center">
                    <i class="bi bi-credit-card feature-icon"></i>
                    <div class="ms-3">
                        <h5 class="fw-bol mt-2">Quick Payment</h5>
                        <p class="small ">100% secure</p>
                    </div>
                </div>

                <!-- Feature 3 -->
                <div
                    class="col-lg-3 col-md-6 col-12 mb-4 d-flex align-items-start justify-content-lg-start justify-content-center text-lg-start text-center">
                    <i class="bi bi-cash-coin feature-icon"></i>
                    <div class="ms-3">
                        <h5 class="fw-bol mt-1">Big Cashback</h5>
                        <p class="small ">Over 50% cash back</p>
                    </div>
                </div>

                <!-- Feature 4 -->
                <div
                    class="col-lg-3 col-md-6 mb-4 d-flex align-items-start justify-content-lg-start justify-content-center text-lg-start text-center">
                    <i class="bi bi-headset feature-icon"></i>
                    <div class="ms-3 mt-2">
                        <h5 class="fw-bold">24/7 Support</h5>
                        <p class="small">Ready for you</p>
                    </div>
                </div>


            </div>
        </div>
    </section>

    <section class="best-selling-section mt-5 py-3">
        <div class="container">

            <!-- Heading -->
            <h2 class="section-title mb-4">Best <span>Selling</span> Medical Equipment Essentials</h2>

            <!-- Search Input -->
            <div class="search-wrapper mb-4">
                <input type="text" class="search-input" placeholder="Search the store">

                <button class="search-btn">
                    <i class="bi bi-search"></i>
                </button>
            </div>


            <!-- Buttons -->
            <div class="row g-4 justify-content-center">
                @foreach ($categories as $category)
                    <div class="col-auto">
                        <button class="cat-btn">{{ $category->name ?? '' }}</button>
                    </div>
                @endforeach
            </div>

        </div>

        <section class="best-products  mt-5">
            <div class="container">
                <div class="row g-4 justify-content-center">
                    @foreach ($products as $product)
                        <div class="col-lg-3 col-md-6">
                            <div class="product-card position-relative">

                                <!-- Discount Badge -->
                                <span class="discount-badge">{{ $product->discount_percent }}% OFF</span>
                                <img src="{{ asset('storage/products/thumbnails/' . $product->thumbnail) }}"
                                    alt="{{ $product->image_alt ?? '' }}" class="product-img img-fluid">

                                <!-- Stars -->
                                <div class="stars">
                                    <i class="bi bi-star-fill gold"></i>
                                    <i class="bi bi-star-fill gold"></i>
                                    <i class="bi bi-star-fill gold"></i>
                                    <i class="bi bi-star-fill gold"></i>
                                    <i class="bi bi-star-fill"></i>
                                </div>

                                <h4 class="product-title">{{ $product->name ?? '' }}</h4>
                                <p class="product-desc">{{ $product->short_description ?? '' }}</p>

                                <div class="d-flex justify-content-between align-items-center price-box">
                                    <span class="old-price">${{ number_format($product->price, 0, '.', ',') }}</span>
                                    <span class="new-price">${{ number_format($product->sale_price, 0, '.', ',') }}</span>

                                    <button class="buy-btn">Buy Now</button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="text-center mt-5">
                    <button class="all-products-btn">All Products</button>
                </div>
            </div>
        </section>

    </section>
    <section class="offer-section mt-5">
        <div class="container">

            <!-- Heading -->
            <h2 class="text-center offer-title">What We <span>Offer</span> </h2>
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
                        <!-- CARD -->
                        @foreach ($offers as $offer)
                            <div class="offer-card">
                                <img src="{{ asset('storage/offers/thumbnails/' . $offer->thumbnail) }}"
                                    alt="{{ $offer->image_alt ?? '' }}" class="card-img img-fluid">
                                <h4 class="card-title">{{ $offer->title ?? '' }}</h4>
                                <hr>
                                <p class="card-desc">{{ $offer->short_description ?? '' }}</p>
                                <button class="read-btn">Read More</button>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Next Button -->
                <button class="offer-next"><i class="bi bi-chevron-right"></i></button>
                <!-- PAGINATION DOTS -->
                <div class="offer-pagination"></div>

            </div>
        </div>
    </section>

    <section class="xray-section py-">

        <div class="container-fluid xray-box p-4 mt-5">
            <div class="container text-center mb-5">
                <div class="row">
                    <div class="col-md-8 mx-auto">
                        <h2 class="main-heading">{{ $x_ray['first_text'] }} <span>{{ $x_ray['second_text'] }}</span>
                        </h2>
                        <p class=" xray-desc">{{ $repairServiceData->x_ray_short_description ?? '' }}</p>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row g-4">
                    <!-- Card -->
                    @foreach ($xrays as $item)
                        <div class="col-lg-3 col-md-6">
                            <div class="xray-card p-3">
                                <h3 class="xray-title ">
                                    {{ $item->title ?? '' }}
                                </h3>

                                <p class="xray-desc ">
                                    {{ $item->short_description ?? '' }}
                                </p>

                                <button class="xray-btn">Read More</button>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </section>
    <section class="xray-section py-">

        <div class="container-fluid xray-box p-4 mt-5">
            <div class="container text-center mb-5">
                <div class="row">
                    <div class="col-md-8 mx-auto">
                        <h2 class="main-heading">{{ $c_arm['first_text'] }} <span>{{ $c_arm['second_text'] }}</span>
                        </h2>
                        <p class="xray-desc">{{ $repairServiceData->c_arm_short_description ?? '' }}</p>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row g-4 justify-content-center">
                    <!-- Card -->
                    @foreach ($carms as $item)
                        <div class="col-lg-3 col-md-6">
                            <div class="xray-card p-3">
                                <h3 class="xray-title reveal-lines">
                                    {{ $item->title ?? '' }}
                                </h3>

                                <p class="xray-desc ">
                                    {{ $item->short_description ?? '' }}
                                </p>

                                <button class="xray-btn">Read More</button>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </section>

    <section class="medical-section py-5">
        <div class="container">

            <!-- Main Heading -->
            <h2 class="text-center mb-5 main-heading">
                Our Life-Saving Medical Equipment for Sales,<span>Services</span> & <span>Rentals</span> !
            </h2>

            <!-- 2 Columns -->
            <div class="row">

                <div class="col-8 mx-auto">

                    <div class="row">
                        <!-- LEFT COLUMN -->
                        <div class="col-lg-6 col-md-12 mb-4 mx-auto">

                            <div class="equipment-block mb-3">
                                <h4 class="equipment-title">Anesthesia Machines</h4>
                                <ul class="equipment-list">
                                    <li>Anesthesia Monitors</li>
                                    <li>Vaporizers</li>
                                    <li>Anesthesia Machines</li>
                                    <li>Portable Ultrasound</li>
                                </ul>
                            </div>

                            <div class="equipment-block mb-3">
                                <h4 class="equipment-title">Endoscopy</h4>
                                <ul class="equipment-list">
                                    <li>Cameras</li>
                                    <li>Insufflators</li>
                                    <li>Pulse Oximeters</li>
                                    <li>Scopes - Gastroscopes, Colonoscopes, Bronchoscopes, Laparoscopes…</li>
                                </ul>
                            </div>

                            <div class="equipment-block mb-3">
                                <h4 class="equipment-title">General Medical Equipment</h4>
                                <ul class="equipment-list">
                                    <li>Patient Monitors</li>
                                    <li>Vital Sign Monitors</li>
                                    <li>High-Precision Instruments</li>
                                    <li>AEDs/Defibrillators</li>
                                    <li>Infusion Pumps</li>
                                    <li>SCD Pumps</li>
                                </ul>
                            </div>

                            <div class="equipment-block mb-3">
                                <h4 class="equipment-title">Laboratory Medical Equipment</h4>
                                <ul class="equipment-list">
                                    <li>Laboratory Medical Equipment</li>
                                </ul>
                            </div>

                        </div>

                        <!-- RIGHT COLUMN -->
                        <div class="col-lg-6 col-md-12 mb-4">

                            <div class="equipment-block mb-3">
                                <h4 class="equipment-title">Imaging Diagnostic Equipment</h4>
                                <ul class="equipment-list">
                                    <li>Imaging Diagnostic Equipment</li>
                                </ul>
                            </div>

                            <div class="equipment-block mb-3">
                                <h4 class="equipment-title">Surgical Equipment</h4>
                                <ul class="equipment-list">
                                    <li>Operation Lights</li>
                                    <li>Surgical Tables</li>
                                    <li>Electrosurgical Units (ESU)</li>
                                    <li>Hypothermia Units</li>
                                    <li>Stretchers / Gurneys / Hospital Beds</li>
                                    <li>COVID-19 Testing</li>
                                </ul>
                            </div>

                            <div class="equipment-block mb-3">
                                <h4 class="equipment-title">Sterilizers</h4>
                                <ul class="equipment-list">
                                    <li>Tabletop Autoclaves – Tuttnauer, Midmark, M11</li>
                                    <li>Free-Standing Autoclaves – Steris, Getinge, Belimed</li>
                                    <li>Physiotherapy Tools</li>
                                </ul>
                            </div>

                            <div class="equipment-block mb-3">
                                <h4 class="equipment-title">Ultrasound</h4>
                                <ul class="equipment-list">
                                    <li>Ultrasound Machines</li>
                                    <li>Portable X-Ray Systems</li>
                                    <li>C-Arms</li>
                                    <li>Bone Density Machines</li>
                                    <li>Radiology Rooms</li>
                                </ul>
                            </div>

                        </div>
                    </div>

                </div>

                <div class="col-8 mx-auto">
                    <p class="bottom-text">
                        We cover a full spectrum of medical equipment, ensuring you have access to everything you need.
                        Hospitals and healthcare providers trust Mr. Biomed Tech Services for clear, precise agreements and
                        targeted financing solutions.
                    </p>

                    <div class="text-start mt-4">
                        <button class=" get-btn">
                            Get in Touch with Us Today!
                        </button>
                    </div>
                </div>

            </div>

        </div>
    </section>

    <section class="oem-trust-section py-5">
        <div class="container">
            <h2 class="text-center mb-5 section-title">Why OEMs Trust <span>Mr Biomed Tech</span> </h2>

            <div class="row g- justify-content-center mx-5">
                <!-- CARD-->
                @foreach ($oems as $item)
                    <div class="col-lg-4 col-md-6 justify-content-center">
                        <div class="oem-card">
                            <div class="oem-img-box">
                                <img src="{{ asset('storage/oem_contents/' . $item->image) }}"
                                    alt="{{ $item->image_alt ?? '' }}" class="oem-img img-fluid">
                                <h4 class="oem-card-title">{{ $item->title ?? '' }}</h4>
                            </div>

                            <p class="oem-desc">{!! $item->description !!}</p>
                            {{-- <p class="oem-desc">
                                We provide top-notch medical equipment that meets international standards.
                            </p>

                            <ul class="oem-list">
                                <li>ISO certified products</li>
                                <li>Durability guaranteed</li>
                                <li>Trusted by hospitals</li>
                            </ul> --}}
                        </div>
                    </div>
                @endforeach

                <div class="text-center mt-5">
                    <button class=" btn-lgg">
                        Talk to Expert
                    </button>
                </div>
            </div>
        </div>
    </section>




    {{-- ================= Our Mission Section ================= --}}
    <x-our-mission />

    {{-- ================= Locations We Serve Section ================= --}}
    <x-location-we-served />

    {{-- ================= Why Choose Biomed Section ================= --}}
    <x-why-choice-biomed />


    <section class="bg-section">
        <div class="overlay"></div>

        <div class="content-wrapper text-center">

            <!-- 10+ Years -->
            {{-- <div class="shadow-div">
                <h2 class="years-text">10+ Years.</h2>


            </div>
            <div class="line-wrapper">
                <div class="line-straight"></div>
            </div> --}}





            <!-- Review Box -->
            {{-- <div class="review-box mx-auto">

                <!-- Left Box (4.9 + star) -->
                <div class="rating-box d-flex g-1 justify-content-center align-items-center">
                    <span class="rating-number">4.9</span>
                    <span class="rating-star">
                        <i class="fa-solid fa-star"></i>
                    </span>
                </div>

                <!-- Right Content -->
                <div class="review-content text-start ps-3">
                    <img src="{{ asset('frontend/images/google-logo.png') }}" class="google-logo" alt="Google">
                    <p class="review-text mb-0">310 reviews on</p>
                </div>

            </div> --}}
        </div>
    </section>


    {{-- ================faqs section ================ --}}

    <x-faq-section :faqs="$faqs" heading="Frequently Asked Questions" subheading="About Our Profile?"
        subtext="We provide sales, rental, and repair services for medical equipment with ISO certified"
        image="frontend/images/hero-main-img.png" :visible="4" />



    {{-- ================= pruduct sectiion ============= --}}
    <x-our-latest-products />


    {{-- ============= reveiw sectiion ================== --}}

    <section>
        <h2 class="review-heading">Our Users Are <span>Happy And Healthy</span> </h2>
        <section class="review-slider-section">
            <div class="review-slider-wrapper">
                <div class="review-slider" id="reviewSlider">

                    <div class="tooltip-slide">
                        <img src="{{ asset('frontend/images/hero-img-1.jpg') }}" alt="Hero 1">
                        <div class="tooltip-box">
                            <div class="stars">
                                <i class="fas fa-star text-warning"></i>
                                <i class="fas fa-star text-warning"></i>
                                <i class="fas fa-star text-warning"></i>
                                <i class="fas fa-star text-warning"></i>
                                <i class="far fa-star text-warning"></i>
                            </div>
                            <p>Pharmacy Store is my go-to.</p>
                        </div>
                    </div>

                    <div class="tooltip-slide">
                        <img src="{{ asset('frontend/images/hero-img-4.jpg') }}" alt="Hero 1">
                        <div class="tooltip-box">
                            <div class="stars">
                                <i class="fas fa-star text-warning"></i>
                                <i class="fas fa-star text-warning"></i>
                                <i class="fas fa-star text-warning"></i>
                                <i class="fas fa-star text-warning"></i>
                                <i class="far fa-star text-warning"></i>
                            </div>
                            <p>Great service.</p>
                        </div>
                    </div>

                    <div class="tooltip-slide">
                        <img src="{{ asset('frontend/images/hero-img-3.jpg') }}" alt="Hero 1">
                        <div class="tooltip-box">
                            <div class="stars">
                                <i class="fas fa-star text-warning"></i>
                                <i class="fas fa-star text-warning"></i>
                                <i class="fas fa-star text-warning"></i>
                                <i class="fas fa-star text-warning"></i>
                                <i class="far fa-star text-warning"></i>
                            </div>
                            <p>Good products.</p>
                        </div>
                    </div>

                    <div class="tooltip-slide">
                        <img src="{{ asset('frontend/images/hero-img-2.jpg') }}" alt="Hero 1">
                        <div class="tooltip-box">
                            <div class="stars">
                                <i class="fas fa-star text-warning"></i>
                                <i class="fas fa-star text-warning"></i>
                                <i class="fas fa-star text-warning"></i>
                                <i class="fas fa-star text-warning"></i>
                                <i class="far fa-star text-warning"></i>
                            </div>
                            <p>Reliable quality.</p>
                        </div>
                    </div>

                    <div class="tooltip-slide">
                        <img src="{{ asset('frontend/images/hero-img-1.jpg') }}" alt="Hero 1">
                        <div class="tooltip-box">
                            <div class="stars">
                                <i class="fas fa-star text-warning"></i>
                                <i class="fas fa-star text-warning"></i>
                                <i class="fas fa-star text-warning"></i>
                                <i class="fas fa-star text-warning"></i>
                                <i class="far fa-star text-warning"></i>
                            </div>
                            <p>Affordable prices.</p>
                        </div>
                    </div>


                </div>
            </div>

        </section>

        <div>


    </section>

    {{-- ============ Recent News Section ============ --}}
    <x-recent-blogs :blogs="$blogs" />




@endsection

@push('frontend-scripts')
    <script>
        const track = document.querySelector(".slider-track");
        const slides = document.querySelectorAll(".slide");
        let index = 1; // start from real first slide
        const total = slides.length;

        // Initial position
        track.style.transform = `translateX(-${index * 100}%)`;

        function autoSlide() {
            index++;
            track.style.transition = "transform 0.7s ease-in-out";
            track.style.transform = `translateX(-${index * 100}%)`;

            // Reset when reach the last clone
            if (index === total - 1) {
                setTimeout(() => {
                    track.style.transition = "none";
                    index = 1; // back to real first slide
                    track.style.transform = `translateX(-100%)`;
                }, 700);
            }
        }

        setInterval(autoSlide, 4000);
    </script>


    <script>
        document.querySelectorAll(".nav-item.dropdown").forEach(drop => {

            let timer;
            let menu = drop.querySelector(".mega-menu");

            drop.addEventListener("mouseenter", () => {
                clearTimeout(timer);
                menu.style.display = "block";
            });

            drop.addEventListener("mouseleave", () => {
                timer = setTimeout(() => {
                    menu.style.display = "none";
                }, 200);
            });

            menu.addEventListener("mouseenter", () => {
                clearTimeout(timer);
                menu.style.display = "block";
            });

            menu.addEventListener("mouseleave", () => {
                timer = setTimeout(() => {
                    menu.style.display = "none";
                }, 200);
            });

        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            let currentImageIndex = 0;

            const imageTrack = document.querySelector(".image-slide-track");
            const slides = document.querySelectorAll(".image-slide-item");
            const totalSlides = slides.length;

            const dots = document.querySelectorAll(".image-dots .dot");

            const slideDuration = 3000;
            let slider;

            // Update dots
            function updateDots() {
                dots.forEach(dot => dot.classList.remove("active"));
                dots[currentImageIndex].classList.add("active");
            }

            // Jump to slide
            function goToSlide(index, withTransition = true) {

                if (withTransition) {
                    imageTrack.style.transition = "transform 0.8s ease-in-out";
                } else {
                    imageTrack.style.transition = "none"; // no jerk when jumping
                }

                imageTrack.style.transform = `translateX(-${index * 25}%)`;
                updateDots();
            }

            // Auto slide
            function autoSlide() {
                slider = setInterval(() => {

                    currentImageIndex++;

                    if (currentImageIndex < totalSlides) {
                        goToSlide(currentImageIndex, true);
                    } else {
                        // Last slide se pehle slide pr jump WITHOUT TRANSITION
                        currentImageIndex = 0;
                        goToSlide(currentImageIndex, false);
                    }

                }, slideDuration);
            }

            // Click dots
            dots.forEach(dot => {
                dot.addEventListener("click", function() {
                    clearInterval(slider);
                    currentImageIndex = parseInt(this.dataset.index);
                    goToSlide(currentImageIndex, true);
                    autoSlide();
                });
            });

            // Initialize
            goToSlide(0, false);
            autoSlide();
        });
    </script>
@endpush
