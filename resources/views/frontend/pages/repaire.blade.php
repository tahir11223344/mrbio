@extends('frontend.layouts.frontend')

{{-- @section('title', 'Repaire') --}}
@section('meta_title', $data->meta_title ?? 'Repaire')
@section('meta_keywords', $data->meta_keywords ?? '')
@section('meta_description', $data->meta_description ?? '')

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

                        <span class="breadcrumb-active"> {!! plainBracketText($data->main_heading ?? '') !!}</span>
                    </div>
                </div>

            </div>

        </div>
    </section>

    <section class="service-video-section">
        <div class="video-overlay"></div>

        @php
            $banner = $data->banner_image ?? null;
            $extension = $banner ? strtolower(pathinfo($banner, PATHINFO_EXTENSION)) : null;
        @endphp

        @if ($banner)
            @if (in_array($extension, ['mp4', 'webm', 'mov']))
                <!-- Background Video -->
                <video class="bg-video" autoplay muted loop playsinline>
                    <source src="{{ asset('storage/repair_services/' . $banner) }}" type="video/{{ $extension }}">
                    Your browser does not support the video tag.
                </video>
            @else
                <!-- Background Image -->
                <div class="bg-image" style="background-image: url('{{ asset('storage/repair_services/' . $banner) }}');">
                </div>
            @endif
        @endif

        <div class="container">
            <div class="row">
                <div class="col-md-6 mx-auto ">

                    <div class="repaire-content text-center">
                        <h2 class="fade-left">{!! highlightBracketText($data->banner_heading ?? '') !!}</h2>
                        <p class="fade-right">
                            {{ $data->banner_short_description ?? '' }}
                        </p>
                        <a href="javascript:void(0)" class="service-btn fade-left" data-open-service-modal>Schedule Your
                            Service Today</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ============ x ray section ===================== --}}
    <x-repair-service-section :types="['repair-service', 'x-ray-repairing', 'c-arm-repairing']" />
    <!-- Output: X-Ray → C-Arm -->

    {{-- ======================== special section ===================== --}}

    <section class="special-section">
        <div class="container">
            <h2 class="special-section-title">Specialized Services <span>All Over Texas From Mr Biomed Tech</span> </h2>

            <div class="card-wrapper">
                <div class="service-card ">
                    <h3>Sterilizer and/or Table Maintenance</h3>
                </div>

                <div class="service-card ">
                    <h3>Anesthesia Machine Repairing & Certification</h3>
                </div>

                <div class="service-card ">
                    <h3>IV Pump Services</h3>
                </div>

                <div class="service-card ">
                    <h3>Life Safety & Electrical Safety Services</h3>
                </div>
            </div>
            <div class="row text-center mt-4">
                <div class="col-md-7 mx-auto">
                    <p class="desc">Mr Biomed Tech is a CBET accredited and HIPAA compliant Texas-based team of biomedical
                        engineers dedicated to serving and upholding the American public healthcare system. We’ve introduced
                        specialized services at cost-effective rates to demonstrate our deep knowledge and years of hands-on
                        experience.</p>

                    <a href="{{ route('contact-us') }}">
                        <button class="expert-btn mt-4">Talk to Expert</button>
                    </a>

                </div>


            </div>
        </div>
    </section>

    {{-- ================= OEM Section  ================= --}}
    <x-oem-section />

    {{-- ================= Why Choose Biomed Section ================= --}}
    <x-why-choice-biomed />

    {{-- ================= CTA Section ================= --}}
    <x-cta-section />




    {{-- ================faqs section ================ --}}

    <x-faq-section :faqs="$faqs" heading="Frequently Asked Questions" subheading="" subtext=""
        image="frontend/images/hero-main-img.png" :visible="4" />

    <!-- BUTTON + ICON GROUP -->
    <x-service-btn />

    {{-- ================= pruduct sectiion ============= --}}
    <x-our-latest-products />

    {{-- ============= reveiw sectiion ================== --}}
    <x-testimonial-slider />

    {{-- ============ Recent News Section ============ --}}
    <!-- Default: 4 blogs -->
    <x-recent-blogs-section />

@endsection





@push('frontend-scripts')
@endpush
