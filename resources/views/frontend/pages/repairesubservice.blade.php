@extends('frontend.layouts.frontend')

@section('title', 'Repaire Sub page')

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

        /* Prev / Next Buttons */
        /* .prev-btn,
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
                                                                                                    } */

        .thumbs {
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
            line-height: 63px;
            margin-bottom: 12px;
        }

        .detail-heading span {
            color: #0A70A2;
            display: block;
        }

        .service-list li {
            font-family: Arial;
            font-weight: 400;
            font-size: 20px;
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
            font-size: 20px;
            line-height: 160%;
            letter-spacing: 0;
            margin-top: 12px;
        }

        /* Right Image */
        .right-img {
            height: 543px;
            width: 407px;
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
    </style>
@endpush

@section('frontend-content')
    <section class="hero-detail-section">
        <div class="container py-5 text-center text-white">

            <h1 class="hero-title mb-3 fade-right">Repair <span> Services Sub page </span> </h1>
            <p class="hero-description mx-auto mb-4 fade-left">
                Discover the comprehensive range of specialized biomedical services we offer, designed to support your
                operational needs and technological advancement.
            </p>

            <div class="container py-5 text-center text-white">
                <div class="simple-breadcrumb-container text-start mx-auto">
                    <div class="simple-breadcrumb">

                        <a href="/" class="breadcrumb-link">Home</a>

                        <span class="breadcrumb-separator">|</span>

                        <span class="breadcrumb-active"> Repaire Sub Page</span>
                    </div>
                </div>

            </div>

        </div>
    </section>

    <section class="biomed-section">
        <div class="container">
            <div class="row justify-content-cente">

                <!-- Left Column -->
                <div class="col-lg-6">

                    <div class="image-slider">
                        {{-- <button class="prev-btn">&#10094;</button> --}}

                        <img id="mainImage" src="{{ asset('frontend/images/rental/product-img.jpg') }}" class="main-img">

                        {{-- <button class="next-btn">&#10095;</button> --}}
                    </div>

                    <div class="thumb-slider-container">

                        <button class="thumb-prev">&#10094;</button>

                        <!-- WRAPPER ADDED HERE -->
                        <div class="thumb-wrapper">
                            <div class="thumbs-track" id="thumbsTrack">
                                @php
                                    $images = [
                                        'small-img.jpg',
                                        'small-img2.jpg',
                                        'small-img3.jpg',
                                        'small-img4.jpg',
                                        'small-img5.jpg',
                                        'small-img6.jpg',
                                    ];
                                @endphp

                                @foreach ($images as $img)
                                    <img src="{{ asset('frontend/images/subservice/' . $img) }}" class="thumb"
                                        onclick="thumbClicked('{{ asset('frontend/images/subservice/' . $img) }}')">
                                @endforeach
                            </div>
                        </div>

                        <button class="thumb-next">&#10095;</button>
                    </div>
                    <div class="pagination-wrapper">
                        <div class="pagination-bar" id="paginationBar"></div>

                    </div>

                </div>

                <!-- Right Column -->
                <div class="col-lg-6">
                    <h2 class="detail-heading">Cost-Effective & Friendly Biomed <span>Repair Services</span> </h2>

                    <ul class="service-list">
                        <li>Fast and reliable biomedical repair Fast and reliable biomedical repair
                            biomedical repair </li>
                        <li>Affordable pricing for clinics & hospitalsFast and
                            biomedical repair</li>
                        <li>Certified and experienced technicians Fast and
                            biomedical repair</li>
                        <li>Premium quality parts usedFast and reliablel
                            repairFast and reliable biomedical repair</li>
                        <li>24/7 customer support availableFast and reliable
                            repair</li>
                        <li>24/7 customer support availableFast and reliable
                            repair</li>
                        <li>24/7 customer support availableFast and reliable
                            repair</li>
                    </ul>

                    <button class="quote-btn">Request A Quote</button>
                </div>

            </div>
        </div>
    </section>

    <section class="austin">
        <div class="container-fluid">

            <div class="row">
                <div class="col-md-12  mx-auto">
                    <h2 class="austin-heading">
                        How We serve in <span>Austin</span>
                    </h2>
                    <p class="austin-desc">
                        nec Praesent libero, placerat nec non dignissim, viverra Lorem tempor vitae elit. viverra turpis
                        faucibus non. sit fringilla risus Nam ex nisl. fringilla Donec sit nisi nec Quisque Vestibulum
                        maximus Nunc ex non. volutpat vitae at, tempor</p>

                    <p class="austin-desc"> ac amet, viverra tincidunt facilisis Sed orci luctus Nam odio tincidunt urna.
                        tincidunt
                        sollicitudin. vel at orci elit tincidunt varius Donec orci dui in at, sapien orci tincidunt Morbi
                        eget eu non. facilisis odio luctus Nullam Morbi non</p>
                    <p class="austin-desc">
                        faucibus viverra ipsum viverra facilisis ex ipsum sapien elit porta ex faucibus odio orci diam
                        Quisque turpis felis, placerat viverra Donec sollicitudin. facilisis elit vitae maximus non urna
                        varius amet, eget quis ipsum eu enim. sit elit
                        Nunc lacus, urna. faucibus vitae lacus dui. dui. eget lacus In faucibus non lobortis, odio sit
                        efficitur. malesuada ex vitae eu placerat. faucibus quam massa sodales. viverra lobortis,
                    </p>


                </div>
            </div>
        </div>
    </section>
    <section class="austin mt-5">
        <div class="container-fluid">

            <div class="row">
                <div class="col-md-12  mx-auto">
                    <h2 class="austin-heading">
                        Benefits for Austin Healthcare <span class="d-block"> Facilities</span>
                    </h2>
                    <p class="austin-desc">
                        nec Praesent libero, placerat nec non dignissim, viverra Lorem tempor vitae elit. viverra turpis
                        faucibus non. sit fringilla risus Nam ex nisl. fringilla Donec sit nisi nec Quisque Vestibulum
                        maximus Nunc ex non. volutpat vitae at, tempor</p>

                    <ul>
                        <li class="austin-li"> nec Praesent libero, placerat nec non dignissim, viverra Lorem tempor vitae
                            placerat nec non dignissim, viverra Lorem tempor vitae
                            elit. viverra
                            turpis</li>
                        <li class="austin-li"> nec Praesent libero, placerat nec non dignissim, viverra Lorem tempor vitae
                            placerat nec non dignissim, viverra Lorem tempor vitae
                            elit. viverra
                            turpis</li>
                        <li class="austin-li"> nec Praesent libero, placerat nec non dignissim, viverra Lorem tempor vitae
                            placerat nec non dignissim, viverra Lorem tempor vitae
                            elit. viverra
                            turpis</li>
                        <li class="austin-li"> nec Praesent libero, placerat nec non dignissim, viverra Lorem tempor vitae
                            placerat nec non dignissim, viverra Lorem tempor vitae
                            elit. viverra
                            turpis</li>
                    </ul>


                </div>
            </div>
        </div>
    </section>
    <section class="problems-section py-5">
        <div class="container">
            <div class="row ">

                <!-- LEFT COLUMN -->
                <div class="col-lg-7 mb-4">
                    <h2 class="common-title">Common Problems We Solve</h2>

                    <ul class="problem-list">
                        <li>Equipment malfunctions and calibration issues</li>
                        <li>Radiation leakage and safety compliance problems</li>
                        <li>Low-quality image output and exposure inconsistencies</li>
                        <li>Preventive maintenance and annual inspections</li>

                    </ul>

                    <h3 class="pro-subtitle">Request Your Free Consultation Today</h3>

                    <p class="section-text">
                        Whether you're a private practice, dental clinic, or diagnostic center,
                        we’re ready to support your imaging goals. Contact us for a free quote on
                        our Dallas-based X-ray machine services.Contact us for a free quote on Contact us for a free quote
                        on Contact us for a free quote on Contact us for a free quote on Contact us for a free quote on for
                        a free quote on

                    </p>
                </div>

                <!-- RIGHT COLUMN -->
                <div class="col-lg-5 text-center">
                    <img src="{{ asset('frontend/images/subservice/sub-img.jpg') }}" alt="Service Image" class="right-img">
                </div>

            </div>
        </div>
    </section>
    <section class="inspection-section mb-4">
        <div class="container">
            <div class="row ">

                <!-- LEFT COLUMN -->
                <div class="col-lg-6 text-center">
                    <img src="{{ asset('frontend/images/subservice/second-img.jpg') }}" alt="Service Image"
                        class="left-img">

                </div>

                <!-- RIGHT COLUMN -->
                <div class="col-lg-6 pt-4">

                    <h3 class="top-heading">Onsite Medical Inspection Services</h3>

                    <h2 class="main-heading">
                        Let Us Get Your Facility Ready For Your Next Inspection
                    </h2>

                    <p class="description">
                        “ Bio-Medical Service, Imaging Service and Local Repair. OEM-Quality Technical Support
                        to meet your medical equipment Maintenance Need ”
                    </p>

                    <h4 class="appointment-title">Make an Appointment</h4>

                    <div class="contact-box">
                        <i class="fa-solid fa-phone contact-icon"></i>
                        <span class="contact-text">+1 800 234 5678</span>
                    </div>

                    <div class="contact-box">
                        <i class="fa-solid fa-envelope contact-icon"></i>
                        <span class="contact-text">support@example.com</span>
                    </div>

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
                        <div class="faq-item">
                            <div class="faq-title">
                                What services does Mr Biomed Tech offer?
                                <i class="bi bi-chevron-down faq-icon"></i>
                            </div>
                            <div class="faq-content">
                                We provide sales, rental, and repair services for medical equipment with ISO certified
                                products and 24/7 support.
                            </div>
                        </div>

                        <div class="faq-item">
                            <div class="faq-title">
                                How can I request a service?
                                <i class="bi bi-chevron-down faq-icon"></i>
                            </div>
                            <div class="faq-content">
                                You can contact us via our website form, email, or call our support team to request any
                                service.
                            </div>
                        </div>

                        <div class="faq-item">
                            <div class="faq-title">
                                Are your products guaranteed?
                                <i class="bi bi-chevron-down faq-icon"></i>
                            </div>
                            <div class="faq-content">
                                Yes, all our equipment comes with manufacturer warranty and quality assurance for
                                reliability.
                            </div>
                        </div>

                        <div class="faq-item">
                            <div class="faq-title">
                                What is the delivery time?
                                <i class="bi bi-chevron-down faq-icon"></i>
                            </div>
                            <div class="faq-content">
                                Delivery depends on product availability, usually 3-7 business days.
                            </div>
                        </div>

                        <div class="faq-item">
                            <div class="faq-title">
                                Can I return a product?
                                <i class="bi bi-chevron-down faq-icon"></i>
                            </div>
                            <div class="faq-content">
                                Yes, returns are possible within 14 days under our return policy.
                            </div>
                        </div>

                        <div class="faq-item">
                            <div class="faq-title">
                                Do you offer installation services?
                                <i class="bi bi-chevron-down faq-icon"></i>
                            </div>
                            <div class="faq-content">
                                Yes, our team provides installation and training for all equipment.
                            </div>
                        </div>
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

                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="news-card bg-white   ">
                        <img src="{{ asset('frontend/images/recent-news-img.png') }}" class="img-fluid w-100"
                            alt="News Image">
                        <div class="p-3">
                            <h5 class="news-title fw-bold mt-2 mb-2">The Future of Technology Solutions: Innovations
                                Driving Business Success</h5>
                            <p class="news-desc small text-muted mb-3">
                                Understand the critical importance of robust cybersecurity measures in modern healthcare.
                                Understand the critical importance of robust cybersecurity measures in modern healthcare.
                            </p>
                            <a href="#"
                                class="read-more-link d-flex align-items-center justify-content-start text-decoration-none">
                                Read More <i class="fas fa-arrow-right ms-2"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="news-card bg-white   ">
                        <img src="{{ asset('frontend/images/recent-news-img.png') }}" class="img-fluid w-100"
                            alt="News Image">
                        <div class="p-3">
                            <h5 class="news-title fw-bold mt-2 mb-2">Advancements in Biomedical Devices: A Game Changer for
                                Healthcare</h5>
                            <p class="news-desc small text-muted mb-3">
                                Understand the critical importance of robust cybersecurity measures in modern healthcare.
                                Understand the critical importance of robust cybersecurity measures in modern healthcare.
                            </p>
                            <a href="#"
                                class="read-more-link d-flex align-items-center justify-content-start text-decoration-none">
                                Read More <i class="fas fa-arrow-right ms-2"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="news-card bg-white   ">
                        <img src="{{ asset('frontend/images/recent-news-img.png') }}" class="img-fluid w-100"
                            alt="News Image">
                        <div class="p-3">
                            <h5 class="news-title fw-bold mt-2 mb-2">Enhancing Efficiency: The Role of AI in Medical
                                Equipment Maintenance</h5>
                            <p class="news-desc small text-muted mb-3">
                                Understand the critical importance of robust cybersecurity measures in modern healthcare.
                                Understand the critical importance of robust cybersecurity measures in modern healthcare.
                            </p>
                            <a href="#"
                                class="read-more-link d-flex align-items-center justify-content-start text-decoration-none">
                                Read More <i class="fas fa-arrow-right ms-2"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="news-card bg-white   ">
                        <img src="{{ asset('frontend/images/recent-news-img.png') }}" class="img-fluid w-100"
                            alt="News Image">
                        <div class="p-3">
                            <h5 class="news-title fw-bold mt-2 mb-2">Cybersecurity in Healthcare: Protecting Patient Data
                                in a Digital Age</h5>
                            <p class="news-desc small text-muted mb-3">
                                Understand the critical importance of robust cybersecurity measures in modern healthcare.
                                Understand the critical importance of robust cybersecurity measures in modern healthcare.

                            </p>
                            <a href="#"
                                class="read-more-link d-flex align-items-center justify-content-start text-decoration-none">
                                Read More <i class="fas fa-arrow-right ms-2"></i>
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

@endsection
@push('frontend-scripts')
    {{-- <script>
        const mainImage = document.getElementById("mainImage");
        const thumbTrack = document.getElementById("thumbsTrack");

        let offset = 0;
        const visibleThumbs = 4;
        const thumbWidth = 92;
        let thumbElements = document.querySelectorAll(".thumb");

        const totalPages = Math.ceil(thumbElements.length / visibleThumbs);
        const paginationBar = document.getElementById("paginationBar");

        // Create Pagination Segments
        for (let i = 0; i < totalPages; i++) {
            let seg = document.createElement("div");
            seg.classList.add("pg-segment");
            seg.dataset.page = i;
            paginationBar.appendChild(seg);
        }

        const pgSegments = document.querySelectorAll(".pg-segment");

        function setActivePage(page) {
            pgSegments.forEach(seg => seg.classList.remove("active"));
            pgSegments[page].classList.add("active");
        }
        setActivePage(0);

        // Slide to page
        function goToPage(page) {
            offset = -(page * visibleThumbs * thumbWidth);
            thumbTrack.style.transform = `translateX(${offset}px)`;
            setActivePage(page);
        }

        // Pagination click
        pgSegments.forEach(seg => {
            seg.onclick = () => goToPage(parseInt(seg.dataset.page));
        });

        // Arrow Left
        document.querySelector(".thumb-prev").onclick = () => {
            let currentPage = Math.abs(offset / (visibleThumbs * thumbWidth));
            if (currentPage > 0) goToPage(currentPage - 1);
        };

        // Arrow Right
        document.querySelector(".thumb-next").onclick = () => {
            let currentPage = Math.abs(offset / (visibleThumbs * thumbWidth));
            if (currentPage < totalPages - 1) goToPage(currentPage + 1);
        };

        // ------------------------------
        //  FIXED FUNCTION (Thumbnail Click)
        // ------------------------------
        function thumbClicked(src) {
            // 1) Main image update
            mainImage.src = src;

            // 2) Clicked thumbnail ko dhoondo
            const clickedThumb = [...thumbElements].find(t => t.src === src);

            // 3) Us thumbnail ko track ke end me move karo
            thumbTrack.appendChild(clickedThumb);

            // 4) Thumbnail NodeList refresh (important)
            thumbElements = document.querySelectorAll(".thumb");

            // 5) Start se show karo (animation visible hota hai)
            goToPage(0);
        }
    </script> --}}
@endpush
