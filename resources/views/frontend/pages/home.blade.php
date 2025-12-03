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
    $heading = split_heading($data->hero_heading);
    $c = split_heading($data->content_heading);
    $x_ray = split_heading($repairServiceData->x_ray_heading);
    $c_arm = split_heading($repairServiceData->c_arm_heading);

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
                    <div class="d-flex align-items-center mt-4">
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

    <section class="xray-section py-5">

        <div class="container-fluid xray-box p-4 mt-5">
            <div class="container text-center mb-5">
                <div class="row">
                    <div class="col-md-8 mx-auto">
                        <h2 class="main-heading">{{ $x_ray['first_text'] }} <span>{{ $x_ray['second_text'] }}</span>
                        </h2>
                        {{-- <p class=" xray-desc"> centers.quipment available for hospitals and emergency healthcare centers.
                            centers.quipment available for hospitals and emergency healthcare centersemergency healthcare
                            centers.
                            centers.quipment available for hospitals and emergency healthcare centers</p> --}}
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
    <section class="xray-section py-5">

        <div class="container-fluid xray-box p-4 mt-5">
            <div class="container text-center mb-5">
                <div class="row">
                    <div class="col-md-8 mx-auto">
                        <h2 class="main-heading">{{ $c_arm['first_text'] }} <span>{{ $c_arm['second_text'] }}</span>
                        </h2>
                        {{-- <p class="xray-desc"> centers.quipment available for hospitals and emergency healthcare centers.
                            centers.quipment available for hospitals and emergency healthcare centersemergency healthcare
                            centers.
                            centers.quipment available for hospitals and emergency healthcare centers</p> --}}
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


    <section class="mission-section">
        <div class="container py-5">
            <div class="row justify-content-center">

                <!-- LEFT COLUMN -->
                <div class="col-lg-4 ">
                    <div class="mx">
                        <img src="{{ asset('frontend/images/chief-img.jpg') }}" alt="oem-img"
                            class="oem-img-2 img-fluid">
                        <h3 class="ceo-name mt-3">Omar Ahmed</h3>
                        <p class="ceo-title">Chief Executive Officer</p>
                    </div>
                </div>

                <!-- RIGHT COLUMN -->
                <div class="col-lg-8">
                    <p class="mission-text ">
                        Our mission is to sell and rent professional devices with added value & services
                        for our customers. We facilitate by scanning the globe to create long-lasting
                        relationships with reputable manufacturers who, in turn, allow us to represent
                        their equipment. We also offer additional value that you cannot find from other
                        companies.
                        Our mission is to sell and rent professional devices with added value & services
                        for our customers. We facilitate by scanning the globe to create long-lasting
                        relationships with reputable manufacturers who, in turn, allow us to represent
                        their equipment. We also offer additional value that you cannot find from other
                        companies.
                    </p>

                    <button class="about-btn ">About Us</button>
                </div>

            </div>
        </div>
    </section>

    <section class="location-section ">
        <div class="container">

            <!-- MAIN HEADING -->
            <h2 class="section-title text-center mt-5">The Location <span>We Served</span> </h2>
            <p class="section-desc text-center">
                We cover a full spectrum of medical equipment, ensuring you have access to everything you need.
                This is the fact that hospitals and healthcare providers trust Mr. Biomed Tech Services for clear,
                precise agreements and targeted financing solutions.
            </p>

            <div class="row align-items-center ">

                <!-- LEFT IMAGE -->
                <div class="col-lg-3 text-center mb-4 mb-lg-0">

                    <img src="{{ asset('frontend/images/location-img.png') }}" alt="Location"
                        class="location-img img-fluid">
                </div>

                <!-- RIGHT BOX -->
                <div class="col-lg-9">
                    <div class="location-box ">

                        <h3 class="box-title">We Are Regional <span>Service Provider</span> </h3>

                        <h4 class="sub-title">Mr Biomed Tech, Primarily Service The Below States:</h4>

                        <!-- 3 COLUMN LIST -->
                        <div class="row mt-3">
                            <div class="col-md-4">
                                <ul class="primary-list">
                                    <li>Texas</li>
                                    <li>Florida</li>
                                    <li>Arkansas</li>
                                </ul>
                            </div>

                            <div class="col-md-4">
                                <ul class="primary-list">
                                    <li>Georgia</li>
                                    <li>Alabama</li>
                                    <li>Tennessee</li>
                                </ul>
                            </div>

                            <div class="col-md-4">
                                <ul class="primary-list">
                                    <li>Louisiana</li>
                                    <li>Mississippi</li>
                                    <li>Oklahoma</li>
                                </ul>
                            </div>
                        </div>

                        <h4 class="sub-title mt-4">
                            Mr Biomed Tech, Also Services These Additional States Through Our Sister Companies
                            At The Scientific Safety Alliance.
                        </h4>

                        <!-- 3 COLUMN LIST #2 -->
                        <div class="row mt-3">
                            <div class="col-md-4">
                                <ul class="secondary-list">
                                    <li>New York</li>
                                    <li>New Jersey</li>
                                    <li>Pennsylvania</li>
                                    <li>New York</li>
                                    <li>New Jersey</li>
                                    <li>Pennsylvania</li>
                                </ul>
                            </div>

                            <div class="col-md-4">
                                <ul class="secondary-list">
                                    <li>California</li>
                                    <li>Arizona</li>
                                    <li>Nevada</li>
                                    <li>New York</li>
                                    <li>New Jersey</li>
                                    <li>Pennsylvania</li>
                                </ul>
                            </div>

                            <div class="col-md-4">
                                <ul class="secondary-list">
                                    <li>Washington</li>
                                    <li>Oregon</li>
                                    <li>Colorado</li>
                                    <li>New York</li>
                                    <li>New Jersey</li>
                                    <li>Pennsylvania</li>
                                </ul>
                            </div>
                        </div>

                    </div><!-- right box end -->
                </div>

            </div>
        </div>
    </section>

    {{-- ================chose section========== --}}

    <section class="py-5">
        <div class="container">

            <!-- Section Title -->
            <h2 class="choose-title">Why Chose <span>Mr Biomed Tech</span> </h2>

            <div class="row g-4 justify-content-center mt-4">

                <!-- CARD 1 -->
                <div class="col-md-6 col-lg-4">
                    <div class="choose-card">
                        <div class="choose-top">
                            <i class="bi bi-check choose-icon"></i>

                            <!-- <div class="choose-icon">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                </div> -->
                            <h4 class="choose-heading">20 Years Experience</h4>
                        </div>
                        <p class="choose-desc">
                            With two decades of industry expertise, we provide reliable medical equipment solutions.
                        </p>
                    </div>
                </div>

                <!-- CARD 2 -->
                <div class="col-md-6 col-lg-4">
                    <div class="choose-card">
                        <div class="choose-top">
                            <i class="bi bi-check choose-icon"></i>

                            <h4 class="choose-heading">100% Availability</h4>
                        </div>
                        <p class="choose-desc">
                            Our equipment and support services are always available when you need them the most.
                        </p>
                    </div>
                </div>

                <!-- CARD 3 -->
                <div class="col-md-6 col-lg-4">
                    <div class="choose-card">
                        <div class="choose-top">
                            <i class="bi bi-check choose-icon"></i>

                            <h4 class="choose-heading">Up-to-date Catalogue</h4>
                        </div>
                        <p class="choose-desc">
                            We keep our product catalog updated with the latest medical equipment and technologies.
                        </p>
                    </div>
                </div>

                <!-- CARD 4 -->
                <div class="col-md-6 col-lg-4">
                    <div class="choose-card">
                        <div class="choose-top">
                            <i class="bi bi-check choose-icon"></i>

                            <h4 class="choose-heading">Regular Checks</h4>
                        </div>
                        <p class="choose-desc">
                            All rental and purchased devices are regularly inspected for performance & safety.
                        </p>
                    </div>
                </div>

                <!-- CARD 5 -->
                <div class="col-md-6 col-lg-4">
                    <div class="choose-card">
                        <div class="choose-top">
                            <i class="bi bi-check choose-icon"></i>

                            <h4 class="choose-heading">ISO Certification</h4>
                        </div>
                        <p class="choose-desc">
                            We follow ISO standards to ensure top-quality products and safe biomedical practices.
                        </p>
                    </div>
                </div>

                <!-- CARD 6 -->
                <div class="col-md-6 col-lg-4">
                    <div class="choose-card">
                        <div class="choose-top">
                            <i class="bi bi-check choose-icon"></i>

                            <h4 class="choose-heading">24/7 Support</h4>
                        </div>
                        <p class="choose-desc">
                            Our dedicated support team is available around the clock for assistance & troubleshooting.
                        </p>
                    </div>
                </div>

                <!-- CARD 7 -->
                <div class="col-md-6 col-lg-4">
                    <div class="choose-card">
                        <div class="choose-top">
                            <i class="bi bi-check choose-icon"></i>

                            <h4 class="choose-heading">Annual Inspection</h4>
                        </div>
                        <p class="choose-desc">
                            We provide yearly inspections to maintain equipment performance and extend lifespan.
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </section>
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

    <section class="faqs-section py-5">
        <div class="container">
            <div class="row align-items-center">
                <!-- Left Column: FAQs -->
                <div class="col-lg-6">
                    <h2 class="faqs-heading">Frequently Asked Questions</h2>
                    <div class="mt-4">
                        <h5 class="faqs-subheading">About Our Profile?</h5>
                        <p class="faq-para">
                            We provide sales, rental, and repair services for medical equipment with ISO certified
                        </p>
                    </div>

                    <div class="faqs-list">
                        <!-- Sample FAQs -->
                        @foreach ($faqs as $item)
                            <div class="faq-item">
                                <div class="faq-title">
                                    {{ $item->question ?? '' }}
                                    <i class="bi bi-chevron-down faq-icon"></i>
                                </div>
                                <div class="faq-content">
                                    {{ $item->answer ?? '' }}
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <button class="btn-see-more">See More</button>
                </div>

                <!-- Right Column: Image -->
                <div class="col-lg-6 text-center">
                    <img src="{{ asset('frontend/images/hero-main-img.png') }}" alt="FAQ Image"
                        class="faq-img img-fluid">
                </div>
            </div>
        </div>
    </section>


    {{-- ================= pruduct sectiion ============= --}}
    <section class="products-series-section py-5">


        <div class="container-fluid py-5 product-series-bg">
            <div class="container text-center">
                <p class="text-center  product-series-para  mb-3">New From Mr Biomed Tech</p>
                <h2 class="text-center mb-5  product-section-heading">Our <span>Latest Products</span> </h2>

                <div class="product-filter-tabs mb-5 d-flex justify-content-center flex-wrap gap-">

                    <button class="filter-btn active" data-filter="featured">Featured</button>

                    <button class="filter-btn" data-filter="equipment">Medical Equipment</button>
                    <button class="filter-btn" data-filter="supplies">Supplies</button>
                    <button class="filter-btn" data-filter="parts">Parts</button>
                </div>
            </div>

            <div class="container mt-4">
                <div class="row g-4">

                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <div class="custom-card shadow-sm position-relative">
                            <span class="discount-badge">10% OFF</span>

                            <div class="card-image-box">
                                <img src="{{ asset('frontend/images/ourproduct-img.jpg') }}" alt="PRODUCT img"
                                    class=" img-fluid">
                            </div>


                            <div class="card-content-box p-3 pt-2">
                                <div class="rating-stars p- pt-2 pb-0">
                                    <i class="fas fa-star text-warning"></i>
                                    <i class="fas fa-star text-warning"></i>
                                    <i class="fas fa-star text-warning"></i>
                                    <i class="fas fa-star text-warning"></i>
                                    <i class="fas fa-star text-warning"></i>
                                </div>
                                <h5 class="product-title fw-bold">Defibrillator X1</h5>
                                <p class="card-text small mb-3">High-performance device for cardiac care and monitoring.
                                </p>

                                <div class="price-action-row d-flex justify-content-between align-items-center">

                                    <span class="old-price text-decoration-line-through text-muted small">$12,000</span>
                                    <span class="new-price fw-bolder fs-5 text-primary">$10,800</span>

                                    <a href="#" class="btn buy-now-btn btn-sm">Buy Now</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <div class="custom-card shadow-sm position-relative">
                            <span class="discount-badge">10% OFF</span>
                            <div class="card-image-box">
                                <img src="{{ asset('frontend/images/ourproduct-img.jpg') }}" alt="PRODUCT img"
                                    class=" img-fluid">
                            </div>

                            <div class="card-content-box p-3 pt-2">
                                <div class="rating-stars p- pt-2 pb-0">
                                    <i class="fas fa-star text-warning"></i>
                                    <i class="fas fa-star text-warning"></i>
                                    <i class="fas fa-star text-warning"></i>
                                    <i class="fas fa-star text-warning"></i>
                                    <i class="fas fa-star text-warning"></i>
                                </div>
                                <h5 class="product-title fw-bold">Patient Monitor P5</h5>
                                <p class="card-text small mb-3">Multi-parameter monitoring solution with touch interface.
                                </p>
                                <div class="price-action-row d-flex justify-content-between align-items-center">

                                    <span class="old-price text-decoration-line-through text-muted small">$5,500</span>
                                    <span class="new-price fw-bolder fs-5 text-primary">$4,950</span>

                                    <a href="#" class="btn buy-now-btn btn-sm">Buy Now</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <div class="custom-card shadow-sm position-relative">
                            <span class="discount-badge">10% OFF</span>
                            <div class="card-image-box">
                                <img src="{{ asset('frontend/images/ourproduct-img.jpg') }}" alt="PRODUCT img"
                                    class=" img-fluid">
                            </div>

                            <div class="card-content-box p-3 pt-2">
                                <div class="rating-stars p- pt-2 pb-0">
                                    <i class="fas fa-star text-warning"></i>
                                    <i class="fas fa-star text-warning"></i>
                                    <i class="fas fa-star text-warning"></i>
                                    <i class="fas fa-star text-warning"></i>
                                    <i class="fas fa-star text-warning"></i>
                                </div>
                                <h5 class="product-title fw-bold">Infusion Pump D3</h5>
                                <p class="card-text small mb-3">Precision fluid delivery system with safety alarms.</p>
                                <div class="price-action-row d-flex justify-content-between align-items-center">

                                    <span class="old-price text-decoration-line-through text-muted small">$1,500</span>
                                    <span class="new-price fw-bolder fs-5 text-primary">$1,350</span>

                                    <a href="#" class="btn buy-now-btn btn-sm">Buy Now</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <div class="custom-card shadow-sm position-relative">
                            <span class="discount-badge">10% OFF</span>
                            <div class="card-image-box">
                                <img src="{{ asset('frontend/images/ourproduct-img.jpg') }}" alt="PRODUCT img"
                                    class=" img-fluid">
                            </div>

                            <div class="card-content-box p-3 pt-2">
                                <div class="rating-stars p- pt-2 pb-0">
                                    <i class="fas fa-star text-warning"></i>
                                    <i class="fas fa-star text-warning"></i>
                                    <i class="fas fa-star text-warning"></i>
                                    <i class="fas fa-star text-warning"></i>
                                    <i class="fas fa-star text-warning"></i>
                                </div>
                                <h5 class="product-title fw-bold">ECG Machine M12</h5>
                                <p class="card-text small mb-3">Compact and reliable 12-lead Electrocardiogram device.</p>
                                <div class="price-action-row d-flex justify-content-between align-items-center">

                                    <span class="old-price text-decoration-line-through text-muted small">$3,200</span>
                                    <span class="new-price fw-bolder fs-5 text-primary">$2,880</span>

                                    <a href="#" class="btn buy-now-btn btn-sm">Buy Now</a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

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

    {{-- ============recent news section ============ --}}



    <section class="recent-news-section py- mb-5">
        <div class="container text-center">
            <h2 class="section-title text-white mb-3">Recent News</h2>
            <p class="section-desc  mb-5">
                Stay updated with the latest trends and insights in biomedical technology and services.
            </p>
        </div>

        <div class="container">
            <div class="row g-4">
                @foreach ($blogs as $item)
                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <div class="news-card bg-white   ">
                            <img src="{{ asset('storage/blog/images/' . $item->image) }}" class="img-fluid w-100"
                                alt="{{ $item->image_alt_text ?? '' }}">
                            <div class="p-3">
                                <h5 class="news-title fw-bold mt-2 mb-2">{{ $item->title ?? '' }}</h5>
                                <p class="news-desc small text-muted mb-3">
                                    {{ $item->short_description ?? '' }}
                                </p>

                                {{-- <p class="news-desc small text-muted mb-3">
                                    Understand the critical importance of robust cybersecurity measures in modern
                                    healthcare.
                                    Understand the critical importance of robust cybersecurity measures in modern
                                    healthcare.
                                </p> --}}
                                <a href="#"
                                    class="read-more-link d-flex align-items-center justify-content-start text-decoration-none">
                                    Read More <i class="fas fa-arrow-right ms-2"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>


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
