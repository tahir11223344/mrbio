@extends('frontend.layouts.frontend')

{{-- @section('title', 'Rental') --}}
@section('meta_title', $data->meta_title ?? 'Rental')
@section('meta_keywords', $data->meta_keywords ?? '')
@section('meta_description', $data->meta_description ?? '')

@push('frontend-styles')
    <style>
        .equipment-section {
            padding: 60px 0;
            font-family: 'Inter', sans-serif;
            z-index: 2;
        }

        /* LEFT COLUMN */
        .rental-main-heading {
            font-size: 32px;
            font-weight: 600;
            color: #000;
            margin-bottom: 15px;
            width: 100%;
            max-width: 570px;
            /* height: 90px; */
            line-height: 140%;

        }

        .rental-main-heading span {
            color: #016B9F;
        }

        .rental-main-desc {
            font-size: 20px;
            color: #000000;
            line-height: 160%;
            font-weight: 400;
            font-family: Arial;
            margin-bottom: 25px;
            width: 100%;
            max-width: 408px;
            /* height: 79px; */
            margin-bottom: 20px;
        }

        .rental-sub-heading {
            /* max-width: 339px; */
            margin-top: 50px;
            font-size: 24px;
            font-weight: 600;
            color: #0168A4;
            line-height: 100%;
            font-family: Inter, sans-serif;
        }

        /*
                                                                                                                                                                                                        .equip-list {
                                                                                                                                                                                                            margin-top: 30px;

                                                                                                                                                                                                        } */

        .li {
            /* padding-left: 18px; */
            color: #000000;
            font-family: Arial;
            font-weight: 400;
            font-size: 20px;
            line-height: 160%;
            /* margin-top: 20px; */
            margin-bottom: 15px;
            max-width: 408px;
        }

        /* RIGHT COLUMN */
        .img-box {
            width: 508px;
            height: 301px;
            background: #0970A2;
            border-radius: 34px;
            padding: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .img-box img {
            width: 508px;
            height: 280px;
            border-radius: 15px;
            object-fit: cover;
            border: 3px solid #0970A2;
        }

        .why-heading {
            margin-top: 30px;
            font-size: 24px;
            font-weight: 600;
            color: #0168A4;
            line-height: 100%;
            font-family: Inter, sans-serif;
        }

        .why-list {
            /* padding-left: 18px; */
            margin-top: 20px;

            width: 100%;
            max-width: 350px;
        }

        .why-list li {
            color: #000000;
            font-family: Arial;
            font-weight: 400;
            font-size: 20px;
            line-height: 160%;
            margin-bottom: 15px;
        }

        .mmx-left {
            margin-left: 18%;

        }

        /* RESPONSIVE */
        @media(max-width: 991px) {
            .img-box {
                width: 100%;
                height: auto;
            }

            .img-box img {
                width: 100%;
                height: auto;
            }

            .rental-img {
                width: 100% !important;
                height: 450px !important;

                margin: 0px !important;
            }

            .btn-overlay {
                bottom: 4px !important;

                width: 255px !important;

            }

            .product-name {
                font-size: 31px !important;
            }

            .product-desc {
                font-size: 17px !important;

            }
        }

        @media(max-width:767px) {
            .mmx-left {
                margin-left: 0%;
            }

            .rental-products-section {
                padding-top: 0px !important;
            }

            .rental-img {
                width: 100% !important;

                margin: 0px !important;
            }

            .btn-overlay {
                bottom: 4px !important;

            }

            .rental-main-heading {
                font-size: 23px !important;

            }

            .rental-main-desc {
                font-size: 16px !important;

            }

            .rental-sub-heading {

                font-size: 22px !important;
            }

            .li {

                font-size: 16px !important;

            }

            .why-heading {
                font-size: 22px !important;

            }

            .main-title {
                font-size: 33px !important;

            }

            .product-name {
                font-size: 30px !important;

            }

            .product-desc {
                font-size: 16px !important;

            }

            .four-column-desc {
                font-size: 38px !important;

            }
        }


        /* =============== rental product css ================== */
        .rental-products-section {
            z-index: 2;
        }

        /* MAIN TITLE */
        .main-title {
            font-size: 48px;
            font-weight: 700;
            font-family: Arial, sans-serif;
            line-height: 140%;
        }

        .main-title span {
            color: #0071A8;
        }

        /* PRODUCT NAME */
        .product-name {
            font-size: 40px;
            font-weight: 600;
            font-family: Inter, sans-serif;
            line-height: 140%;
        }

        .product-name span {
            color: #0071A8;

        }

        /* DESCRIPTION */
        .product-desc {
            font-size: 20px;
            line-height: 1.6;
            color: #000000;
            font-family: Arial, Helvetica, sans-serif;
            width: 100%;
            max-width: 693px;
            /* height: 79px; */
            font-weight: 400;
            line-height: 160%;
            margin-left: 0;
        }

        /* BUTTON – GET SERVICE */
        .btn-wrraper {
            margin-top: 50px
        }

        .btn-service {
            position: relative;
            display: inline-flex;
            align-items: center;
            gap: 10px;
            /* padding: 12px 25px; */
            border-radius: 10px;
            border: none;
            cursor: pointer;
            overflow: hidden;
            z-index: 0;
            max-width: 189px;
            width: 100%;
            height: 43px;
            background: #0168A4;
            color: #FFFFFF;
            box-shadow: 0px 4px 4px #00000040;
            font-weight: 400;
            font-family: Inter;
            font-size: 20px;
            line-height: 100%;
            transition: color 0.8s ease-in-out;
        }

        .btn-service>* {
            position: relative;
            z-index: 3;
        }

        .btn-service .bi {
            font-size: 18px;
            transition: color 0.8s ease, transform 0.8s ease;
        }

        .btn-service::after {
            content: "";
            position: absolute;
            top: 0;
            right: -100%;
            width: 100%;
            height: 100%;
            background: #FFFFFF;

            z-index: 2;
            transition: right 0.8s cubic-bezier(.2, .9, .2, 1);
            pointer-events: none;
        }

        .btn-service:hover::after {
            right: 0;
        }

        .btn-service:hover {
            color: #000000;
        }

        .btn-service:hover .bi {
            color: #000000;
            transform: translateX(-2px);
        }

        .btn-service .btn-label {
            transition: color 0.8s ease-in-out;
        }

        .btn-service:focus {
            outline: none;
            box-shadow: 0 0 0 3px rgba(1, 104, 164, 0.3);
        }



        .btn-call {
            position: relative;
            display: inline-flex;
            align-items: center;
            gap: 15px;

            width: 100%;
            max-width: 152px;
            height: 43px;

            padding-left: 32px;
            border-radius: 10px;
            border: none;
            cursor: pointer;
            overflow: hidden;

            background: #0168A4;
            color: #FFFFFF;
            box-shadow: 0px 4px 4px #00000040;
            font-weight: 700;
            font-family: Inter, sans-serif;
            font-size: 20px;
            line-height: 1;
            transition: color 0.8s ease-in-out;
        }

        .btn-call>* {
            position: relative;
            z-index: 3;
        }

        .btn-call .bi {
            font-size: 18px;
            transition: color 0.4s ease, transform 0.25s ease-in-out;
        }

        .btn-call::after {
            content: "";
            position: absolute;
            top: 0;
            right: -100%;
            width: 100%;
            height: 100%;
            background: #FFFFFF;
            z-index: 2;
            transition: right 0.7s cubic-bezier(.2, .9, .2, 1);
            pointer-events: none;
        }

        /* HOVER: slide overlay */
        .btn-call:hover::after {
            right: 0;
        }

        /* TEXT + ICON changes to black */
        .btn-call:hover {
            color: #000000;
        }

        .btn-call:hover .bi {
            color: #000000;
            transform: translateX(-2px);
        }

        /* Text transition */
        .btn-call .btn-label {
            transition: color 0.4s ease-in-out;
        }


        /* RIGHT SIDE IMAGE */
        .img-wrapper {
            width: 100%;
            max-width: 450px;
            margin: auto;
        }

        .rental-img {
            width: 407px;
            height: 535px;
            border-radius: 15px;
            border: 5px solid #0071A8;
            box-shadow: 0px 0px 20px #0071A8;
            object-fit: cover;
            display: block;
            margin: 10px;
        }

        /* OVERLAY BUTTON ON IMAGE */
        .btn-overlay {
            position: absolute;
            bottom: 5px;
            left: 50%;
            transform: translateX(-50%);
            background: #E8141480;
            color: #fff;
            border: 1px solid #0071A8;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;

            font-size: 36px;
            font-weight: 700;
            font-family: Inter, sans-serif;
            width: 297px;
            height: 51px;
            line-height: 160%;
            /* box-shadow: 0px 0px 20px #0071A8; */
            transition: all 0.4s ease;
        }

        .btn-overlay:hover {
            background: #41040480;

        }



        /* =============== four-column-section ======================= */

        /*
                                                                                                                                                                                                                                                                                                * Background Color Calculation:
                                                                                                                                                                                                                                                                                                * #D9D9D938 is an RGBA value. The '38' is the alpha (opacity) channel in hex.
                                                                                                                                                                                                                                                                                                * This translates to a light grey color with low opacity.
                                                                                                                                                                                                                                                                                                */
        .four-column-section {
            background-color: #D9D9D938;
            padding: 40px 20px;
            /* height: 100%; */
            /* height: 358px; */
        }



        .icon-wrapper {
            margin-bottom: 15px;
            text-align: center;
        }

        .icon-wrapper i {
            color: #046DA0;
            font-size: 50px;
            display: block;
            margin: 0 auto;
            text-align: center;

        }

        .title {
            font-size: 22px;
            font-weight: 700;
            color: #000000;
            margin-top: 0;
            margin-bottom: 10px;
            line-height: 100%;
            font-family: Inter, sans-serif;
            text-align: center;

        }

        .description {
            font-size: 14px;
            color: #000000;
            line-height: 100%;
            font-weight: 400;
            font-family: Inter, sans-serif;
            text-align: center;
            margin-top: 20px;
            width: 100%;
            max-width: 263px;
        }

        .four-column-desc {
            font-size: 48px;
            font-weight: 700;
            color: #0D0D0D;
            margin-top: 0;
            margin-bottom: 30px;
            line-height: 140%;
            font-family: Inter, sans-serif;
            text-align: center;

        }

        .four-column-desc span {
            color: #046DA0;
        }


        .img-dots {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-top: 50px;
        }

        .img-dots .dot {
            width: 12px;
            height: 12px;
            background: #ccc;
            border-radius: 50%;
            display: inline-block;
            cursor: pointer;
            transition: 0.3s;
        }

        .img-dots .dot.active {
            background: #046DA0;
            transform: scale(1.2);
        }
    </style>
@endpush

@section('frontend-content')


    <section class="hero-detail-section">
        <div class="container py-5 text-center text-white">

            <h1 class="hero-title mb-3 fade-right">{!! highlightBracketText($data->hero_title ?? '', ['#000000']) !!}</h1>
            <p class="hero-description mx-auto mb-4 fade-left">
                {{ $data->hero_subtitle ?? '' }}
            </p>

            <div class="container py-5 text-center text-white">
                <div class="simple-breadcrumb-container text-start mx-auto">
                    <div class="simple-breadcrumb">

                        <a href="/" class="breadcrumb-link">Home</a>

                        <span class="breadcrumb-separator">|</span>

                        <span class="breadcrumb-active"> {!! plainBracketText($data->hero_title ?? '') !!}</span>
                    </div>
                </div>

            </div>

        </div>
    </section>
    <section class="hero-circles-section position-relative overflow-hidden">

        <div class="circle-one"></div>
        <div class="circle-two"></div>


        <section class="equipment-section">
            <div class="container">
                <div class="row ">

                    <!-- LEFT COLUMN -->
                    <div class="col-lg-6 left-col">

                        <h2 class="rental-main-heading">
                            {!! highlightBracketText($data->main_heading ?? '') !!}
                        </h2>

                        <div class="rental-main-desc">
                            {{ $data->main_description ?? '' }}
                        </div>

                        <h3 class="rental-sub-heading">{!! highlightBracketText($data->equipment_heading ?? '') !!}</h3>
                        {{-- 
                        <ul class="equip-list">
                            <li>Hospital Beds</li>
                            <li>Ventilators</li>
                            <li>Wheelchairs</li>
                            <li>Suction Machines</li>
                            <li>Oxygen Concentrators</li>
                            <li>Cardiac Monitors</li>
                            <li>Infusion Pumps</li>
                            <li>Patient Stretchers</li>

                        </ul> --}}
                        <div class="li">
                            {!! $data->equipment_list ?? '' !!}

                        </div>
                    </div>

                    <!-- RIGHT COLUMN -->
                    <div class="col-lg-6 right-col">

                        <!-- Image Outer Box -->
                        <div class="img-box">
                            <img src="{{ asset('storage/rental_services/' . $data->main_image) }}"
                                alt="{{ $data->main_image_alt ?? '' }}" class="img-fluid  ">
                        </div>

                        <div class="d-flex flex-column justify-content-center mmx-left">
                            <h3 class="why-heading">{!! highlightBracketText($data->why_rent_heading ?? '') !!}</h3>

                            {{-- <ul class="why-list">
                                <li>Mr. Biomed rents various types of medical equipment to both medical facilities and home
                                    healthcare.</li>
                                <li>We provide certified and well-maintained devices meeting all safety standards.</li>
                                <li>24/7 customer support for all rental equipment and emergency needs.</li>

                            </ul> --}}
                            <div class="li">
                                {!! $data->why_rent_list ?? '' !!}

                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </section>



        <section class="rental-products-section py-5">
            <div class="container">
                <h2 class="main-title text-center mb-5 fade-left">RENTAL <span>PRODUCTS</span></h2>

                <div id="product-list">
                    <div class="row justify-content-center g-5">

                        @foreach ($products as $product)
                            @include('components.product-item', ['product' => $product])
                        @endforeach

                        @if ($products->count() > 0)
                            <div class="mt-4">
                                {{-- {{ $products->links() }} --}}
                                {{ $products->links('vendor.pagination.simple-default') }}
                            </div>
                        @endif


                        {{-- <div class="pagination">
                            <a href="#" class="page-link">&laquo;</a>
                            <a href="#" class="page-link">1</a>
                            <a href="#" class="page-link active">2</a>
                            <a href="#" class="page-link">3</a>

                            <span class="ellipsis">---</span>

                            <a href="#" class="page-link">15</a>
                            <a href="#" class="page-link">&raquo;</a>
                        </div> --}}
                    </div>
                </div>
            </div>
        </section>


    </section>

    <!-- BUTTON + ICON GROUP -->
    <x-service-btn />



    <section class="four-column-section">
        <div class="container">
            <div class="row">
                <h1 class="four-column-desc">Rental <span>Process</span> </h1>
                <div class="col-lg-3 col-md-6">
                    <div class="icon-wrapper">
                        <i class="fas fa-phone-alt contact-icon"></i>
                    </div>
                    <h3 class="title">Contact</h3>
                    <p class="description">
                        Get in touch with a biomed technician to discover rental options and request a quote.
                    </p>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="icon-wrapper">
                        <i class="fas fa-handshake confirmation-icon skewed-icon"></i>
                    </div>
                    <h3 class="title">Confirmation</h3>
                    <p class="description">
                        We confirm equipment availability and pricing and only finalize booking once you’re thoroughly
                        satisfied.</p>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="icon-wrapper">
                        <i class="fas fa-dollar-sign payment-icon"></i>
                    </div>
                    <h3 class="title">Payment</h3>
                    <p class="description">
                        While we prepare your equipment, choose from our flexible payment options.</p>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="icon-wrapper">
                        <i class="fas fa-truck delivery-icon"></i>
                    </div>
                    <h3 class="title">Delivery</h3>
                    <p class="description">
                        Within 24 hours or less, your equipment will be delivered, installed, and tested to ensure proper
                        functionality.
                    </p>
                </div>
            </div>
        </div>
    </section>


    {{-- ================= CTA Section ================= --}}
    <x-cta-section />


    {{-- ================= Why Choose Biomed Section ================= --}}
    <x-why-choice-biomed />


    {{-- ================= Rental Products Name ================= --}}
    <x-rental-product-list-columns />


    {{-- ================faqs section ================ --}}

    <x-faq-section :faqs="$faqs" heading="Frequently Asked Questions" subheading="" subtext=""
        image="frontend/images/hero-main-img.png" :visible="4" />


    {{-- ================= pruduct sectiion ============= --}}
    <x-our-latest-products />

    {{-- ============= reveiw sectiion ================== --}}
    <x-testimonial-slider />

    {{-- ============ Recent News Section ============ --}}
    <!-- Default: 4 blogs -->
    <x-recent-blogs-section />

@endsection

@push('frontend-scripts')
    <script>
        document.querySelectorAll(".product-section").forEach(section => {

            const mainImg = section.querySelector(".mainProductImg");
            const dots = section.querySelectorAll(".dot");

            dots.forEach(dot => {
                dot.addEventListener("click", () => {

                    // Update image
                    mainImg.src = dot.dataset.img;

                    // Active dot switch
                    dots.forEach(d => d.classList.remove("active"));
                    dot.classList.add("active");
                });
            });

        });
    </script>
@endpush
