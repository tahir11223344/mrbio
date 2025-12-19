@extends('frontend.layouts.frontend')

@section('title', 'Repaire')

@push('frontend-styles')
    <style>
        .service-video-section {
            position: relative;
            width: 100%;
            height: 583px;
            overflow: hidden;
            /* display: flex;
                                                                                                                                                                                                    align-items: center; */
            /* padding-left: 60px;  */
            color: #fff;
        }

        .service-video-section .bg-video {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .service-video-section .video-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: #006A9E66;
            /* given overlay color */
            z-index: 1;
        }

        /* Content */
        .service-video-section .repaire-content {
            position: relative;
            z-index: 2;
            /* max-width: 800px; */
            /* margin: 0 auto; */
            margin-top: 80px;
        }

        .service-video-section h2 {
            font-family: Arial;
            font-weight: 600;
            font-size: 48px;
            line-height: 63px;
            text-transform: capitalize;
            text-align: center;
            /* width: 573px; */
        }

        .service-video-section span {
            color: #046CA0;
            display: block;
        }

        .service-video-section p {
            font-family: Arial;
            font-weight: 400;
            font-size: 20px;
            line-height: 160%;
        }

        .service-btn {
            display: inline-block;
            background: #006A9E;
            color: #fff;
            padding: 12px 25px;
            border-radius: 5px;
            text-decoration: none;
            font-weight: bold;
            transition: 0.3s;
            margin-top: 30px;
        }

        .service-btn:hover {
            background: #00527b;
            transform: translateY(-3px) scale(1.03);
        }

        .service-btn:hover {
            background: #006A9E;
            color: #fff;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .service-video-section {
                padding: 30px;
                height: auto;
                padding-top: 80px;
                padding-bottom: 80px;
            }

            .service-video-section h2 {
                font-size: 24px;
            }
        }

        @media(max-width: 767px) {
            .special-section-title {

                font-size: 29px !important;

            }

            .desc {

                font-size: 14px !important;

            }
        }

        /* ============ special section ================ */

        .special-section {
            background-color: #D9D9D966;
            padding: 40px 0;
        }

        .special-section-title {
            text-align: center;
            font-family: Arial;
            font-weight: 600;
            font-size: 48px;
            line-height: 63px;
            text-transform: capitalize;
            margin-bottom: 30px;
            /* width: 602px; */
            margin: 0 auto;
        }

        .special-section-title span {
            color: #076EA1;
            display: block;
        }

        .card-wrapper {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 20px;
        }

        .service-card {
            position: relative;
            width: 266px;
            height: 117px;
            background: #F0F0F0;
            border-radius: 25px;
            padding: 15px;
            margin: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            border: 4px solid #FE0000;
            /* static red border */
            overflow: hidden;
            transition: transform 0.4s ease;
        }

        /* Moving medical gradient glow */
        .service-card::before {
            content: "";
            position: absolute;
            inset: -6px;
            border-radius: 30px;

            background: conic-gradient(#df0000,
                    #076EA1,
                    #df0000,
                    #076EA1);

            animation: glowMove 6s linear infinite;
        }

        /* Inner mask */
        .service-card::after {
            content: "";
            position: absolute;
            inset: 4px;
            background: #F0F0F0;
            border-radius: 21px;
        }

        /* Content on top */
        .service-card>* {
            position: relative;
            z-index: 2;
            text-align: center;
        }

        /* Smooth rotation */
        @keyframes glowMove {
            from {
                transform: rotate(0deg);
            }

            to {
                transform: rotate(360deg);
            }
        }

        /* Hover effects */
        .service-card:hover::before {
            animation-duration: 1.9s;
            /* faster rotation on hover */
        }

        .service-card:hover {
            transform: scale(1.08);
            transition: all 0.4s ease-in-out;
            /* slight zoom for attention */
        }






        .service-card h3 {
            margin: 0;
            font-size: 22px;
            font-weight: 700;
            font-family: Inter, sans-serif;
            line-height: 100%;
            text-align: center;
            color: #0168A4;

        }

        .desc {
            font-family: Arial;
            font-weight: 400;
            font-size: 20px;
            line-height: 160%;
            color: #000000;
        }

        .expert-btn {
            background-color: #0168A4;
            color: #fff;
            border: none;
            width: 198px;
            height: 43px;
            font-size: 18px;
            border-radius: 10px;
            cursor: pointer;
            font-weight: 500;
            line-height: 100%;
            font-family: Inter, sans-serif;
            transition: all 0.4s ease-in-out;
        }

        .expert-btn:hover {
            background-color: #025788;
            transform: scale(1.04)
        }
    </style>
@endpush

@section('frontend-content')

    <section class="hero-detail-section">

        <div class="container py-5 text-center text-white">

            <h1 class="hero-title mb-3 fade-right">{!! highlightBracketText($data->main_heading ?? '', ['#000000']) !!}</span> </h1>
            <p class="hero-description mx-auto mb-4 fade-left">
                {{ $data->main_short_description ?? '' }}
            </p>

            <div class="container py-5 text-center text-white">
                <div class="simple-breadcrumb-container text-start mx-auto fade-right">
                    <div class="simple-breadcrumb">

                        <a href="/" class="breadcrumb-link">Home</a>

                        <span class="breadcrumb-separator">|</span>

                        <span class="breadcrumb-active"> Repair Main Page</span>
                    </div>
                </div>

            </div>

        </div>
    </section>

    <section class="service-video-section">
        <div class="video-overlay"></div>

        <!-- Background Video -->
        <video class="bg-video" autoplay muted loop playsinline>
            <source src="{{ asset('storage/repair_services/' . $data->banner_image) }}" type="video/mp4">
        </video>
        <div class="container">
            <div class="row">
                <div class="col-md-6 mx-auto ">

                    <div class="repaire-content text-center">
                        <h2 class="fade-left">{!! highlightBracketText($data->banner_heading ?? '') !!}</h2>
                        <p class="fade-right">
                            {{ $data->banner_short_description ?? '' }}
                        </p>
                        <a href="#" class="service-btn fade-left">Schedule Your Service Today</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ============ x ray section ===================== --}}
    <x-repair-service-section :types="['repair-service', 'x-ray', 'c-arm']" />
    <!-- Output: X-Ray → C-Arm -->

    {{-- ======================== special section ===================== --}}

    <section class="special-section">
        <div class="container">
            <h2 class="special-section-title">Specialized Services in <span>Mr biomed Tech, TX</span> </h2>

            <div class="card-wrapper">
                <div class="service-card ">
                    <h3>ipsum illo maxime? Accusamus repellendus eveniet</h3>
                </div>

                <div class="service-card ">
                    <h3>Anesthesia Machine Repairing and Certification </h3>
                </div>

                <div class="service-card ">
                    <h3>IV Pump Services</h3>
                </div>

                <div class="service-card ">
                    <h3>Life Safety and Electrical Safety Serives</h3>
                </div>
            </div>
            <div class="row text-center mt-4">
                <div class="col-md-7 mx-auto">
                    <p class="desc">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Architecto vitae eaque at
                        commodi vel
                        itaque
                        quaerat ipsum illo maxime? Accusamus repellendus eveniet ipsum illo maxime? Accusamus repellendus
                        eveniet est aliquid rerum ad commodi et veritatis
                        nobis!</p>

                    <button class="expert-btn mt-4">Talk to Expert</button>
                </div>


            </div>
        </div>
    </section>

    {{-- ================= OEM Section  ================= --}}
    <x-oem-section />

    {{-- ================= Why Choose Biomed Section ================= --}}
    <x-why-choice-biomed />

    <section class="cta-contact-section">
        <div class="container ">

            <div class="row">
                <div class="col-lg-8">
                    <h2 class="cta-contact-heading">
                        Have a question? we’d love to hear from you.
                    </h2>
                    <div class="d-flex gap-5">

                        <div class="cta-contact-box">
                            {{-- <img src="left-icon.png" alt="left icon" class="contact-icon"> --}}
                            <span class="cta-contact-sp">|</span>

                            <span class="cta-contact-text">
                                Get In Touch With Mr-Biomed Tech Today!
                            </span>

                            <div class="cta-img-wraper">
                                <img src="/frontend/images/rental/contact-img2.png" alt="right icon"
                                    class="cta-contact-icon">
                                <img src="/frontend/images/rental/contact-img4.png" alt="" class="cta-phone">
                                <span class="cta-line">|</span>
                            </div>
                        </div>
                        <img src="/frontend/images/rental/contact-img1.png" alt=""
                            class="img-fluid cta-contact-img1">
                    </div>
                </div>
                <div class="col-lg-4 text-center">
                    <img src="{{ asset('frontend/images/rental/contact-img3.png') }}" alt="cta img"
                        class="cta-image img-fluid">
                </div>
            </div>

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
        <h2 class="review-heading">Our Users Are <span>Happy And Healthy</span></h2>

        <div class="container">

            <div class="mx-auto main-wrapper" style="width:1100px;">

                <div class="swiper reviewSwiper">
                    <div class="swiper-wrapper">

                        <!-- Slide 1 -->
                        <div class="swiper-slide tooltip-slide">
                            <img src="{{ asset('frontend/images/hero-img-1.jpg') }}" alt="">
                            <div class="tooltip-box">
                                <div class="starss">
                                    <i class="fas fa-star "></i>
                                    <i class="fas fa-star "></i>
                                    <i class="fas fa-star "></i>
                                    <i class="fas fa-star "></i>
                                    <i class="fas diff fa-star "></i>
                                </div>
                                <p>

                                    <span class="quote">“</span> "Pharmacy Store is my go-to for over-the-counter
                                    medications and health products. They
                                    have a wide selection, and their website makes it easy to order online. The only
                                    improvement I'd suggest is expanding their beauty and skincare section."
                                </p>
                            </div>
                        </div>

                        <!-- Slide 2 -->
                        <div class="swiper-slide tooltip-slide">
                            <img src="{{ asset('frontend/images/hero-img-4.jpg') }}">
                            <div class="tooltip-box">
                                <div class="starss">
                                    <i class="fas fa-star "></i>
                                    <i class="fas fa-star "></i>
                                    <i class="fas fa-star "></i>
                                    <i class="fas fa-star "></i>
                                    <i class="fas fa-star diff"></i>
                                </div>
                                <p>
                                    <span class="quote">“</span>
                                    "Pharmacy Store is my go-to for over-the-counter medications and health products. They
                                    have a wide selection, and their website makes it easy to order online. The only
                                    improvement I'd suggest is expanding their beauty and skincare section."
                                </p>
                            </div>
                        </div>

                        <!-- Slide 3 -->
                        <div class="swiper-slide tooltip-slide">
                            <img src="{{ asset('frontend/images/hero-img-3.jpg') }}">
                            <div class="tooltip-box">
                                <div class="starss">
                                    <i class="fas fa-star "></i>
                                    <i class="fas fa-star "></i>
                                    <i class="fas fa-star "></i>
                                    <i class="fas fa-star "></i>
                                    <i class="fas fa-star diff"></i>
                                </div>
                                <p>
                                    <span class="quote">“</span>
                                    "Pharmacy Store is my go-to for over-the-counter medications and health products. They
                                    have a wide selection, and their website makes it easy to order online. The only
                                    improvement I'd suggest is expanding their beauty and skincare section."
                                </p>
                            </div>
                        </div>

                        <!-- Slide 4 -->
                        <div class="swiper-slide tooltip-slide">
                            <img src="{{ asset('frontend/images/hero-img-2.jpg') }}">
                            <div class="tooltip-box">
                                <div class="starss">
                                    <i class="fas fa-star "></i>
                                    <i class="fas fa-star "></i>
                                    <i class="fas fa-star "></i>
                                    <i class="fas fa-star "></i>
                                    <i class="fas fa-star diff "></i>
                                </div>
                                <p>
                                    <span class="quote">“</span>
                                    "Pharmacy Store is my go-to for over-the-counter medications and health products. They
                                    have a wide selection, and their website makes it easy to order online. The only
                                    improvement I'd suggest is expanding their beauty and skincare section."
                                </p>
                            </div>
                        </div>

                        <!-- Slide 5 -->
                        <div class="swiper-slide tooltip-slide">
                            <img src="{{ asset('frontend/images/hero-img-1.jpg') }}">
                            <div class="tooltip-box">
                                <div class="starss">
                                    <i class="fas fa-star "></i>
                                    <i class="fas fa-star "></i>
                                    <i class="fas fa-star "></i>
                                    <i class="fas fa-star "></i>
                                    <i class="fas diff fa-star "></i>
                                </div>
                                <p>
                                    <span class="quote">“</span>
                                    "Pharmacy Store is my go-to for over-the-counter medications and health products. They
                                    have a wide selection, and their website makes it easy to order online. The only
                                    improvement I'd suggest is expanding their beauty and skincare section."
                                </p>
                            </div>
                        </div>
                        <div class="swiper-slide tooltip-slide">
                            <img src="{{ asset('frontend/images/hero-img-1.jpg') }}">
                            <div class="tooltip-box">
                                <div class="starss">
                                    <i class="fas fa-star "></i>
                                    <i class="fas fa-star "></i>
                                    <i class="fas fa-star "></i>
                                    <i class="fas fa-star "></i>
                                    <i class="fas fa-star diff"></i>
                                </div>
                                <p>
                                    <span class="quote">“</span>
                                    "Pharmacy Store is my go-to for over-the-counter medications and health products. They
                                    have a wide selection, and their website makes it easy to order online. The only
                                    improvement I'd suggest is expanding their beauty and skincare section."
                                </p>
                            </div>
                        </div>
                        <div class="swiper-slide tooltip-slide">
                            <img src="{{ asset('frontend/images/hero-img-1.jpg') }}">
                            <div class="tooltip-box">
                                <div class="starss">
                                    <i class="fas fa-star "></i>
                                    <i class="fas fa-star "></i>
                                    <i class="fas fa-star "></i>
                                    <i class="fas fa-star "></i>
                                    <i class="fas fa-star diff"></i>
                                </div>
                                <p>
                                    <span class="quote">“</span>
                                    "Pharmacy Store is my go-to for over-the-counter medications and health products. They
                                    have a wide selection, and their website makes it easy to order online. The only
                                    improvement I'd suggest is expanding their beauty and skincare section."
                                </p>
                            </div>
                        </div>
                        <div class="swiper-slide tooltip-slide">
                            <img src="{{ asset('frontend/images/hero-img-1.jpg') }}">
                            <div class="tooltip-box">
                                <div class="starss">
                                    <i class="fas fa-star "></i>
                                    <i class="fas fa-star "></i>
                                    <i class="fas fa-star "></i>
                                    <i class="fas fa-star "></i>
                                    <i class="fas fa-star diff"></i>
                                </div>
                                <p>
                                    <span class="quote">“</span>
                                    "Pharmacy Store is my go-to for over-the-counter medications and health products. They
                                    have a wide selection, and their website makes it easy to order online. The only
                                    improvement I'd suggest is expanding their beauty and skincare section."
                                </p>
                            </div>
                        </div>
                        <div class="swiper-slide tooltip-slide">
                            <img src="{{ asset('frontend/images/hero-img-1.jpg') }}">
                            <div class="tooltip-box">
                                <div class="starss">
                                    <i class="fas fa-star "></i>
                                    <i class="fas fa-star "></i>
                                    <i class="fas fa-star "></i>
                                    <i class="fas fa-star "></i>
                                    <i class="fas fa-star diff"></i>
                                </div>
                                <p>
                                    <span class="quote">“</span>
                                    "Pharmacy Store is my go-to for over-the-counter medications and health products. They
                                    have a wide selection, and their website makes it easy to order online. The only
                                    improvement I'd suggest is expanding their beauty and skincare section."
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ============ Recent News Section ============ --}}
    <!-- Default: 4 blogs -->
    <x-recent-blogs-section />

@endsection





@push('frontend-scripts')
@endpush
