@extends('frontend.layouts.frontend')

{{-- @section('title', 'Offer') --}}

@section('meta_title', $data->meta_title ?? 'Offer')
@section('meta_keywords', $data->meta_keywords ?? '')
@section('meta_description', $data->meta_description ?? '')


@push('frontend-styles')
    <style>
        .biomed-section {
            padding: 40px 0;
        }

        .image-slider {
            position: relative;
            width: 510px;
            height: 499px;
        }

        .main-img {
            width: 100%;
            max-width: 510px;
            height: 499px;
            object-fit: cover;
            border: 5px solid #0071A8;
            border-radius: 15px;
            margin-top: 23px;
        }


        .next-btn {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background: #004A6D;
            color: #fff;
            border: none;
            padding: 6px 15px;
            font-size: 20px;
            cursor: pointer;
            border-radius: 50%;
        }

        .prev-btn {
            left: -53px;
        }

        .next-btn {
            right: -53px;
        }

        */ .thumbs {
            margin-top: 15px;
            display: flex;
            gap: 10px;
        }

        .thumb {
            width: 90px;
            height: 90px;
            object-fit: cover;
            border-radius: 8px;
            cursor: pointer;
            border: 3px solid transparent;
        }

        .thumb:hover {
            border-color: #0071A8;
        }

        /* Right Column */


        .detail-heading {
            font-size: 32px;
            font-weight: 700;
            margin-bottom: 20px;
            line-height: 42px;
            margin-bottom: 12px;
        }

        .detail-heading span {
            color: #0A70A2;
        }

        .service-list {
            font-family: Arial;
            font-weight: 400;
            font-size: 16px;
            line-height: 160%;
            letter-spacing: 0;
            margin-bottom: 12px;
        }

        .quote-btn {
            background-color: #0071A8;
            color: #fff;
            border: none;
            font-size: 18px;
            border-radius: 10px;
            cursor: pointer;
            width: 100%;
            max-width: 248px;
            height: 43px;
            font-weight: 500;
            line-height: 100%;
            font-family: Inter;
            box-shadow: 0px 4px 4px #00000040;
            margin-top: 20px;
            transition: all 0.4s ease-in-out
        }

        .quote-btn:hover {
            background-color: #015b88;
            transform: scale(1.03) translateY(-4px);
        }

        .thumb-slider-container {
            position: relative;
            width: 100%;
            display: flex;
            align-items: center;
            gap: 5px;
            margin-top: 36px;
            margin-left: 6%;
        }

        /* Only this container hides extra thumbnails */
        .thumb-wrapper {
            width: 350px;
            /* 4 thumbs * (82px + gap) */
            overflow: hidden;
        }

        .thumbs-track {
            display: flex;
            gap: 10px;
            transition: transform 0.5s ease-in-out;
        }

        .thumb {
            width: 82px;
            height: 45px;
            border-radius: 6px;
            cursor: pointer;
            object-fit: cover;
            border: 2px solid transparent;
        }

        .thumb:hover {
            border-color: #0071A8;
        }

        .thumb-prev,
        .thumb-next {
            background: #0071A8;
            color: #fff;
            border: none;
            padding: 8px 12px;
            cursor: pointer;
            border-radius: 6px;
            font-size: 18px;
        }

        /* Pagination segments */
        .pagination-wrapper {
            width: 350px;

            display: flex;
            justify-content: center;
            margin-left: 11%;

        }

        .pagination-bar {
            display: flex;
            justify-content: center;
            gap: 8px;
            margin-top: 20px;
        }

        .pg-segment {
            width: 40px;
            height: 8px;
            background: #d1d1d1;
            border-radius: 2px;
            cursor: pointer;
            transition: background 0.3s;
        }

        .pg-segment.active {
            background: #015e8c;
        }



        .austin-li {
            font-family: Arial;

            font-weight: 400;


            font-size: 20px;


            line-height: 160%;
            text-align: start !important;
            margin-bottom: 20px
        }

        /* Section Styling */
        .problems-section {
            background: #ffffff;
            margin-top: 40px;
        }

        /* Title */
        .common-title {
            font-family: Arial;
            font-weight: 700;
            font-size: 48px;
            line-height: 100%;
            letter-spacing: 0;
            text-transform: capitalize;
            color: #0168A4;
        }

        /* List */
        .problem-list li {
            font-family: Arial;
            font-weight: 400;
            font-size: 20px;
            line-height: 160%;
            letter-spacing: 0;
            margin-bottom: 12px;
        }

        /* Subtitle */
        .pro-subtitle {
            font-family: Arial;
            font-weight: 700;
            font-size: 48px;
            line-height: 100%;
            letter-spacing: 0;
            text-transform: capitalize;
            color: #0168A4;
            margin-top: 50px
        }

        /* Paragraph */
        .section-text {
            font-family: Arial;
            font-weight: 400;
            font-size: 16px;
            line-height: 160%;
            letter-spacing: 0;
            margin-top: 12px;
        }

        /* Right Image */
        .right-img {
            height: 450px;
            width: 350px;
            object-fit: cover;
            border-radius: 12px;
            transition: all 0.4s ease-in-out;
        }

        .right-img:hover {
            transform: scale(1.02) translateY(-10px)
        }

        /* Mobile Responsive */
        @media(max-width: 576px) {
            .right-img {
                width: 100%;
                height: auto;
            }
        }







        /* Section Container */
        .inspection-section {
            height: 656px;
            background: linear-gradient(to right, #A5CDE0, #006A9E);
            display: flex;
            align-items: center;
        }

        /* Image Left Side */
        .left-img {
            height: 656px;
            width: 511px;
            object-fit: cover;
        }

        /* Right Column Text */
        .top-heading {
            color: #000000;
            font-weight: 600;
            font-size: 24px;
            /* margin-bottom: 10px; */
            line-height: 20px;
            font-family: Inter;

        }

        .main-heading {
            color: #ffffff;
            font-weight: 500;
            font-size: 22px;
            margin-bottom: 10px;
            line-height: 63px;
            font-family: Inter;
        }

        .description {
            color: #ffffff;
            font-weight: 500;
            font-size: 40px;
            margin-bottom: px;
            line-height: 100%;
            font-family: Inter;
        }

        .appointment-title {
            color: #000000;
            font-weight: 600;
            font-size: 22px;
            margin-bottom: 10px;
            line-height: 63px;
            font-family: Inter;
        }

        /* Contact Section */
        .contact-box {
            display: flex;
            align-items: center;
            margin-bottom: 12px;
        }

        .contact-icon {
            font-size: 22px;
            margin-right: 10px;
            color: #FE0000;
            /* Red Icon */
        }

        .contact-text {
            color: #ffffff;
            font-weight: 300;
            font-size: 22px;
            margin-bottom: px;
            line-height: 100%;
            font-family: Inter;
        }

        /* Mobile Responsive */
        @media(max-width: 768px) {
            .inspection-section {
                height: auto;
                padding: 50px 0;
            }

            .left-img {
                width: 100%;
                height: auto;
                margin-bottom: 20px;
            }
        }

        @media(max-width: 767px) {
            .common-title {

                font-size: 26px !important;

            }

            .pro-subtitle {

                font-size: 20px !important;

            }

            .section-text {

                font-size: 15px !important;

            }

            .problem-list li {

                font-size: 16px !important;

            }
        }


        .service-card {
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
            text-align: left;
            min-height: 450px;
            width: 100%;
            max-width: 400px;
            transition: 0.3s;
        }

        .service-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
        }

        .service-card img {
            width: 100%;
            height: 180px;
            border-radius: 8px;
            margin-bottom: 15px;
        }

        .service-card h4 {
            font-size: 20px;
            font-weight: 600;
            margin-bottom: 10px;
        }

        .service-card p {
            font-size: 14px;
            color: #666;
        }

        .service-card span {
            font-size: 14px;
            color: #666;
        }



        .service-feature {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-top: 5px;
            font-weight: 400;
        }

        .service-feature i {
            color: #0d6efd;
            font-size: 14px;
        }

        .custom-carddd {
            border-radius: 10px;
            overflow: hidden;
            background: linear-gradient(135deg, #014c7a, #0168A4, #18adf2);
            transition: 0.3s;
            width: 100%;
            max-width: 420px;
            min-height: 410px;
            color: #ffffff;
        }

        .custom-carddd h4 {
            font-size: 20px;
            font-weight: 600;
            margin-bottom: 10px;
        }

        .card-desc {
            display: -webkit-box;
            -webkit-line-clamp: 5;
            -webkit-box-orient: vertical;
            overflow: hidden;
            text-align: left;
            font-size: 14px;
            font-weight: 400;
            color: #ffffff;
        }

        .custom-carddd.expanded .card-desc {
            -webkit-line-clamp: unset;
        }

        .see-more-btn {
            text-align: center;
            margin-top: 10px;
            cursor: pointer;
            font-size: 20px;
        }

        .see-more-btn i {
            transition: transform 0.3s ease;
        }

        /* rotate icon */
        .custom-carddd.expanded .see-more-btn i {
            transform: rotate(180deg);
        }

        .custom-carddd:hover {
            transform: translateY(-6px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
        }

        .custom-carddd img {
            width: 100%;
            height: 220px;
            object-fit: cover;
        }

        .custom-carddd .card-body {
            padding: 20px;
        }

        .custom-carddd h4 {
            font-size: 20px;
            font-weight: 600;
            margin-bottom: 10px;
            color: #ffffff;
        }

        .custom-carddd p {
            font-size: 14px;
            color: #ffffff;

        }



        .category-list {
            width: 300px;
        }

        .category-item {
            border-bottom: 1px solid #eee;
        }

        .category-header {
            display: flex;
            justify-content: space-between;
            padding: 12px;
            cursor: pointer;
        }

        .category-header span {
            font-size: 18px;
            font-weight: 400;
        }

        .category-header i {
            transition: 0.3s;
        }

        /* Subcategory hidden */
        .subcategory {
            max-height: 0;
            overflow: hidden;
            transition: 1s ease;
            padding-left: 15px;

        }

        /* Hover par open */
        .category-item:hover .subcategory {
            max-height: 200px;
        }

        /* icon rotate */
        .category-item:hover .category-header i {
            transform: rotate(180deg);
        }

        .subcategory p {
            margin: 8px 0;
            font-size: 14px;
        }
    </style>
@endpush

@section('frontend-content')
    <section class="hero-detail-section">
        <div class="container py-1 text-center text-white">

            <h1 class="hero-title mb-3 fade-right">{!! highlightBracketText($data->title ?? '', ['#000000']) !!}</h1>
            <p class="hero-description mx-auto mb-4 fade-left">{{ $data->short_description ?? '' }}</p>

            <div class="container py-5 text-center text-white">
                <div class="simple-breadcrumb-container text-start mx-auto">
                    <div class="simple-breadcrumb">

                        <a href="/" class="breadcrumb-link">Home</a>

                        <span class="breadcrumb-separator">|</span>

                        <span class="breadcrumb-active"> {{ $data->slug }}</span>
                    </div>
                </div>

            </div>

        </div>
    </section>

    <!-- BUTTON + ICON GROUP -->
    <x-service-btn />

    <section class="biomed-section">
        <div class="container">
            <div class="row justify-content-cente">

                <!-- Left Column -->
                <div class="col-lg-6">

                    <div class="image-slider">
                        {{-- <button class="prev-btn">&#10094;</button> --}}

                        <img id="mainImage" src="{{ asset('storage/offers/thumbnails/' . $data->thumbnail) }}"
                            class="main-img">

                        {{-- <button class="next-btn">&#10095;</button> --}}
                    </div>

                    <div class="thumb-slider-container">

                        <button class="thumb-prev">&#10094;</button>

                        @if (!empty($data->all_images) && is_array($data->all_images))
                            <div class="thumb-wrapper">
                                <div class="thumbs-track" id="thumbsTrack">
                                    @foreach ($data->all_images as $img)
                                        <img src="{{ asset($img) }}" class="thumb"
                                            onclick="thumbClicked('{{ asset($img) }}')">
                                    @endforeach
                                </div>
                            </div>
                        @endif

                        <button class="thumb-next">&#10095;</button>
                    </div>
                    <div class="pagination-wrapper">
                        <div class="pagination-bar" id="paginationBar"></div>

                    </div>

                </div>

                <!-- Right Column -->
                <div class="col-lg-6">
                    <h2 class="detail-heading">{!! highlightBracketText($data->content_title ?? '') !!}</h2>
                    {{-- {!! $data->content_description ?? ''!!} --}}
                    <div class="service-list">
                        {!! $data->description ?? '' !!}
                    </div>

                    <button class="quote-btn" data-open-service-modal>Request A Quote</button>
                </div>

            </div>
        </div>
    </section>

    <section class="austin">
        <div class="container-fluid">

            <div class="row">
                <div class="col-md-12  mx-auto">
                    <h2 class="austin-heading">
                        {!! highlightBracketText($data->serve_heading ?? '') !!}
                    </h2>
                    <div class="austin-desc">
                        {!! $data->serve_description ?? '' !!}
                    </div>


                </div>
            </div>
        </div>
    </section>


    @php
        $billingCards = $offerCards['billing-services'] ?? collect();
        $servicesCards = $offerCards['services'] ?? collect();
        $billingHeading =
            optional($billingCards->firstWhere('section_heading'))->section_heading ?? 'Medical Billing Services';
        $servicesHeading =
            optional($servicesCards->firstWhere('section_heading'))->section_heading ?? 'Our Healthcare Solutions';
    @endphp

    @if ($billingCards->isNotEmpty())
        <section class="billing-services py-5">
            <div class="container">

                <h2 class="text-center mb-5">{{ $billingHeading }}</h2>

                <div class="swiper billingSwiper">
                    <div class="swiper-wrapper">
                        @foreach ($billingCards as $card)
                            <div class="swiper-slide">
                                <div class="service-card">
                                    @if ($card->image)
                                        <img src="{{ asset('storage/offers/cards/' . $card->image) }}" class="img-fluid"
                                            alt="{{ $card->image_alt ?? $card->title }}">
                                    @endif

                                    <h4>{{ $card->title }}</h4>

                                    <p>
                                        {!! $card->description !!}
                                    </p>

                                    @php
                                        $featureTexts =
                                            $card->feature_texts ?? ($card->feature_text ? [$card->feature_text] : []);
                                    @endphp
                                    {{-- @foreach ($featureTexts as $featureText)
                                        @if (!empty($featureText))
                                            <div class="service-feature">
                                                <i class="bi bi-check-circle-fill"></i>
                                                <span>{{ $featureText }}</span>
                                            </div>
                                        @endif
                                    @endforeach --}}
                                    <div class="category-list">

                                        <div class="category-item">
                                            <div class="category-header">
                                                <span>Medical Equipment</span>
                                                <i class="bi bi-chevron-down"></i>
                                            </div>

                                            <div class="subcategory">
                                                
                                                <p>ECG Machine</p>
                                                <p>Patient Monitor</p>
                                                <p>Ventilator</p>
                                            </div>
                                        </div>

                                        <div class="category-item">
                                            <div class="category-header">
                                                <span>Surgical Instruments</span>
                                                <i class="bi bi-chevron-down"></i>
                                            </div>

                                            <div class="subcategory">
                                                <p>Forceps</p>
                                                <p>Scissors</p>
                                                <p>Scalpels</p>
                                            </div>
                                        </div>

                                        <div class="category-item">
                                            <div class="category-header">
                                                <span>Hospital Furniture</span>
                                                <i class="bi bi-chevron-down"></i>
                                            </div>

                                            <div class="subcategory">
                                                <p>Hospital Bed</p>
                                                <p>Bedside Locker</p>
                                                <p>IV Stand</p>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

            </div>
        </section>
    @endif

    @if ($servicesCards->isNotEmpty())
        <section class="services-section py-5">
            <div class="container">

                <h2 class="text-center mb-5">{{ $servicesHeading }}</h2>

                <div class="swiper serviceSlider2">
                    <div class="swiper-wrapper">
                        @foreach ($servicesCards as $card)
                            <div class="swiper-slide">
                                <div class="custom-carddd">

                                    @if ($card->image)
                                        <img src="{{ asset('storage/offers/cards/' . $card->image) }}" class="card-img-top"
                                            alt="{{ $card->image_alt ?? $card->title }}">
                                    @endif

                                    <div class="card-body">
                                        <h4>{{ $card->title }}</h4>

                                        <div class="card-desc">
                                            {!! $card->description !!}
                                        </div>



                                    </div>
                                    <div class="see-more-btn">
                                        <i class="bi bi-chevron-down"></i>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

            </div>
        </section>
    @endif

    <section class="austin mt-5">
        <div class="container-fluid">

            <div class="row">
                <div class="col-md-12  mx-auto">
                    <h2 class="austin-heading">
                        {!! highlightBracketText($data->benefits_heading ?? '') !!}</span>
                    </h2>
                    <div class="austin-desc">
                        {!! $data->benefits_description ?? '' !!}
                    </div>

                </div>
            </div>
        </div>
    </section>
    <section class="problems-section py-5">
        <div class="container">
            <div class="row ">

                <!-- LEFT COLUMN -->
                <div class="col-lg-7 mb-4">

                    <div class="section-text">
                        {!! $data->challenges_description ?? '' !!}
                    </div>

                </div>

                <!-- RIGHT COLUMN -->
                <div class="col-lg-5 text-center">
                    <img src="{{ asset('storage/offers/challenges/' . $data->challenges_image) }}"
                        alt="{{ $data->challenges_image_alt ?? '' }}" class="right-img">
                </div>

            </div>
        </div>
    </section>
    <section class="inspection-section mb-4">
        <div class="container">
            <div class="row ">

                <!-- LEFT COLUMN -->
                <div class="col-lg-6 text-center">
                    <img src="{{ asset('storage/offers/cta/' . $data->cta_thumbnail) }}"
                        alt="{{ $data->cta_image_alt ?? '' }}" class="left-img">
                </div>

                <!-- RIGHT COLUMN -->
                <div class="col-lg-6 pt-4">
                    <div class="description">
                        {!! $data->cta_description ?? '' !!}

                    </div>

                    <h4 class="appointment-title">Make an Appointment</h4>

                    @if (setting('phone'))
                        <div class="contact-box">
                            <i class="fa-solid fa-phone contact-icon"></i>
                            <span class="contact-text">
                                <a href="tel:{{ cleanPhone(setting('phone')) }}" title="Call Us">
                                    {{ setting('phone') }}
                                </a>
                            </span>
                        </div>
                    @endif

                    @if (setting('email'))
                        <div class="contact-box">
                            <i class="fa-solid fa-envelope contact-icon"></i>
                            <span class="contact-text">
                                <a href="mailto:{{ setting('email') }}" target="_blank"
                                    title="Send us an Email">{{ setting('email') }}</a>
                            </span>
                        </div>
                    @endif
                </div>

            </div>
        </div>
    </section>

    {{-- ================= CTA Section ================= --}}
    {{-- <x-cta-section /> --}}

    {{-- ================faqs section ================ --}}

    <x-faq-section :faqs="$faqs" heading="Frequently Asked Questions" subheading="" subtext=""
        image="frontend/images/faq-image.png" :visible="4" />



    {{-- ================= pruduct sectiion ============= --}}
    <x-our-latest-products />

    {{-- ============= reveiw sectiion ================== --}}
    {{-- <x-testimonial-slider /> --}}

    {{-- ============ Recent News Section ============ --}}
    <!-- Default: 4 blogs -->
    {{-- <x-recent-blogs-section /> --}}


@endsection
@push('frontend-scripts')
    <script>
        var swiper = new Swiper(".billingSwiper", {

            slidesPerView: 3,
            spaceBetween: 20,
            loop: true,

            autoplay: {
                delay: 2500,
                disableOnInteraction: false
            },

            grabCursor: true,
            simulateTouch: true,

            breakpoints: {

                0: {
                    slidesPerView: 1
                },
                576: {
                    slidesPerView: 1
                },
                768: {
                    slidesPerView: 2
                },
                992: {
                    slidesPerView: 3
                }

            }

        });


        // ✅ Hover on full card pause slider
        document.querySelectorAll(".service-card").forEach(card => {

            card.addEventListener("mouseenter", () => {
                swiper.autoplay.stop();
            });

            card.addEventListener("mouseleave", () => {
                swiper.autoplay.start();
            });

        });
    </script>
    <script>
        var swiper2 = new Swiper(".serviceSlider2", {

            slidesPerView: 3,
            spaceBetween: 20,
            loop: true,

            autoplay: {
                delay: 2500,
                disableOnInteraction: false,
                pauseOnMouseEnter: true // Hover par pause
            },
            grabCursor: true, // Mouse drag feel
            simulateTouch: true, // Desktop par bhi swipe
            touchRatio: 1,
            touchAngle: 45,
            breakpoints: {

                0: {
                    slidesPerView: 1
                },

                576: {
                    slidesPerView: 1
                },

                768: {
                    slidesPerView: 2
                },

                992: {
                    slidesPerView: 3
                }

            }

        });
    </script>
    <script>
        document.addEventListener("click", function(e) {

            const btn = e.target.closest(".see-more-btn");
            if (!btn) return;

            const card = btn.closest(".custom-carddd");
            const icon = btn.querySelector("i");

            card.classList.toggle("expanded");

            if (card.classList.contains("expanded")) {
                icon.classList.remove("bi-chevron-down");
                icon.classList.add("bi-chevron-up");
            } else {
                icon.classList.remove("bi-chevron-up");
                icon.classList.add("bi-chevron-down");
            }

            // 🔹 Important
            swiper2.updateAutoHeight();
            swiper2.update();

        });
    </script>
@endpush
