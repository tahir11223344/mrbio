@extends('frontend.layouts.frontend')

@section('meta_title', $data->meta_title ?? 'Rental Services')
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
            font-size: 16px;
            color: #444;
            line-height: 1.6;
            margin-bottom: 25px;
            width: 100%;
            max-width: 408px;
            /* height: 79px; */
            margin-bottom: 20px;
        }

        .rental-sub-heading {

            margin-top: 122px;
            font-size: 24px;
            font-weight: 600;
            color: #0168A4;
            line-height: 100%;
            font-family: Inter, sans-serif;
        }

        .equip-list {
            margin-top: 30px;

        }

        .equip-list li {
            /* padding-left: 18px; */
            color: #000000;
            font-family: Arial;
            font-weight: 400;
            font-size: 20px;
            line-height: 160%;
            /* margin-top: 20px; */
            margin-bottom: 15px;
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
        }

        @media(max-width:767px) {
            .mmx-left {
                margin-left: 0%;
            }

            .rental-products-section {
                padding-top: 0px !important;
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
            padding: 12px 25px;
            border-radius: 10px;
            border: none;
            cursor: pointer;
            overflow: hidden;
            z-index: 0;

            background: #0168A4;
            color: #FFFFFF;
            box-shadow: 0px 4px 10px #00000040;
            font-weight: 700;
            font-family: Inter, sans-serif;
            font-size: 20px;
            line-height: 1;
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

        /* ============= pagination =================== */

        .pagination {
            display: flex;
            justify-content: center;
            list-style: none;
            padding: 0;
            margin-top: 70px;
            /* margin-right: 130px; */
        }

        .page-link {
            color: #A2A6B0;
            display: flex;
            /* text center */
            align-items: center;
            /* vertical center */
            justify-content: center;
            /* horizontal center */
            height: 46px;
            width: 46px;
            padding: 0;
            text-decoration: none;
            transition: background-color 0.3s;
            border: 2px solid #A2A6B0;
            margin: 0 4px;
            border-radius: 50%;
        }


        .page-link.active {
            background-color: #B7E9FF;
            color: #333;
            border: 1px solid #B7E9FF;
        }

        .page-link:hover:not(.active) {
            background-color: #0071A8;
            color: #FFFFFF;
        }

        .page-link:first-child,
        .page-link:last-child {
            font-weight: bold;
        }

        .ellipsis {
            color: #555;
            padding: 8px 16px;
            margin: 0 4px;
            align-self: center;
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

                        <span class="breadcrumb-active"> Rental Services Detail Page</span>
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

                        <p class="rental-main-desc">
                            {{ $data->main_description ?? '' }}
                        </p>

                        <h3 class="rental-sub-heading">{!! highlightBracketText($data->equipment_heading ?? '') !!}</h3>

                        <ul class="equip-list">
                            {{-- <li>Hospital Beds</li>
                            <li>Ventilators</li>
                            <li>Wheelchairs</li>
                            <li>Suction Machines</li>
                            <li>Oxygen Concentrators</li>
                            <li>Cardiac Monitors</li>
                            <li>Infusion Pumps</li>
                            <li>Patient Stretchers</li> --}}

                            {!! $data->equipment_list ?? '' !!}
                        </ul>

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

                            <ul class="why-list">
                                {{-- <li>Mr. Biomed rents various types of medical equipment to both medical facilities and home
                                    healthcare.</li>
                                <li>We provide certified and well-maintained devices meeting all safety standards.</li>
                                <li>24/7 customer support for all rental equipment and emergency needs.</li> --}}

                                {!! $data->why_rent_list ?? '' !!}
                            </ul>
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

                        <div class="mt-4">
                            {{-- {{ $products->links() }} --}}
                            {{ $products->links('vendor.pagination.simple-default') }}
                        </div>


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
                        **Contact us according to your specific needs and requirements.** Our dedicated support team is

                    </p>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="icon-wrapper">
                        <i class="fas fa-handshake confirmation-icon skewed-icon"></i>
                    </div>
                    <h3 class="title">Confirmation</h3>
                    <p class="description">
                        **Your order or service request will be officially confirmed via email or SMS immediately.** This
                        confirmation process verifies

                    </p>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="icon-wrapper">
                        <i class="fas fa-dollar-sign payment-icon"></i>
                    </div>
                    <h3 class="title">Payment</h3>
                    <p class="description">
                        **Complete your payment securely and conveniently using your preferred method.** We offer multiple
                        safe
                        payment

                    </p>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="icon-wrapper">
                        <i class="fas fa-truck delivery-icon"></i>
                    </div>
                    <h3 class="title">Delivery</h3>
                    <p class="description">
                        **Your purchased goods will be processed and delivered promptly to your specified address.** We
                        utilize

                    </p>
                </div>
            </div>
        </div>
    </section>
    <section class="cta-contact-section">
        <div class="container ">

            <div class="row">
                <div class="col-lg-8">
                    <h2 class="cta-contact-heading">
                        Have a question? we’d love to hear from you.
                    </h2>
                    <div class="d-flex flex-wra gap-5">

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

    {{-- ================= Why Choose Biomed Section ================= --}}
    <x-why-choice-biomed />



    <section class="medical-equipment-section py-5">
        <div class="container">

            <!-- Heading -->

            <div class="row">
                <div class="col-8 mx-auto">
                    <h2 class="equipment-heading text-center mb-">
                        Our Wide Selection of <span>Medical Equipment Includes</span>
                    </h2>
                </div>
            </div>
            <!-- 3 Columns -->
            <div class="row justify-content-center">

                <!-- Column 1 -->
                <div class="col-lg-4 col-md-6 mb-4">
                    <ul class="equipment-list">
                        <li><i class="bi bi-check yes-icon"></i> Wheelchairs</li>
                        <li><i class="bi bi-check yes-icon"></i> Hospital Beds</li>
                        <li><i class="bi bi-check yes-icon"></i> Oxygen Cylinders</li>
                        <li><i class="bi bi-check yes-icon"></i> Ventilators</li>
                        <li><i class="bi bi-check yes-icon"></i> Nebulizers</li>
                        <li><i class="bi bi-check yes-icon"></i> Suction Machines</li>
                        <li><i class="bi bi-check yes-icon"></i> IV Stands</li>
                        <li><i class="bi bi-check yes-icon"></i> ECG Machines</li>
                    </ul>
                </div>

                <!-- Column 2 -->
                <div class="col-lg-4 col-md-6 mb-4">
                    <ul class="equipment-list">
                        <li><i class="bi bi-check yes-icon"></i> Pulse Oximeters</li>
                        <li><i class="bi bi-check yes-icon"></i> BP Monitors</li>
                        <li><i class="bi bi-check yes-icon"></i> Glucometers</li>
                        <li><i class="bi bi-check yes-icon"></i> Wheel Walkers</li>
                        <li><i class="bi bi-check yes-icon"></i> Air Mattresses</li>
                        <li><i class="bi bi-check yes-icon"></i> CPAP Machines</li>
                        <li><i class="bi bi-check yes-icon"></i> Oxygen Concentrators</li>
                        <li><i class="bi bi-check yes-icon"></i> Defibrillators</li>
                    </ul>
                </div>

                <!-- Column 3 -->
                <div class="col-lg-4 col-md-12 mb-4">
                    <ul class="equipment-list">
                        <li><i class="bi bi-check yes-icon"></i> Patient Monitors</li>
                        <li><i class="bi bi-check yes-icon"></i> Syringe Pumps</li>
                        <li><i class="bi bi-check yes-icon"></i> Infusion Pumps</li>
                        <li><i class="bi bi-check yes-icon"></i> Folding Stretchers</li>
                        <li><i class="bi bi-check yes-icon"></i> Examination Lights</li>
                        <li><i class="bi bi-check yes-icon"></i> Surgical Instruments</li>
                        <li><i class="bi bi-check yes-icon"></i> Thermometers</li>
                        <li><i class="bi bi-check yes-icon"></i> CPAP Masks</li>
                    </ul>
                </div>

            </div>
        </div>
    </section>


    {{-- ================faqs section ================ --}}

    <x-faq-section :faqs="$faqs" heading="Frequently Asked Questions" subheading="About Our Profile?"
        subtext="We provide sales, rental, and repair services for medical equipment with ISO certified"
        image="frontend/images/hero-main-img.png" :visible="4" />


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

    {{-- ============ Recent News Section ============ --}}
    <x-recent-blogs :blogs="$blogs" />
    
@endsection

@push('frontend-scripts')
    <script>
        document.querySelectorAll(".product-section").forEach(section => {

            const mainImg = section.querySelector(".mainProductImg");
            const dots = section.querySelectorAll(".dot");

            dots.forEach(dot => {
                dot.addEventListener("click", () => {

                    mainImg.src = dot.dataset.img;

                    dots.forEach(d => d.classList.remove("active"));
                    mainImg.classList.remove("active-img");

                    dot.classList.add("active");
                });
            });

        });
    </script>

    <script>
        $(document).on('click', '.pagination a', function(e) {
            e.preventDefault();

            let url = $(this).attr('href');

            $.get(url, function(data) {
                $('#product-list').html($(data).find('#product-list').html());
            });
        });
    </script>
@endpush
