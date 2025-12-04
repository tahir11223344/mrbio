@extends('frontend.layouts.frontend')

@section('title', 'About Us')

@push('frontend-styles')
    <style>
        .company-overview {
            padding: 60px 0;
        }

        /* Heading stays left — no wrapping to next column */
        .co-heading {
            font-size: 48px;
            font-weight: 700;
            margin-bottom: 20px;
            max-width: 500px;
            font-family: Arial, Helvetica, sans-serif;
            line-height: 48px;
            /* forces heading to remain left column */
        }

        .co-heading span {
            color: #0168A4;
        }

        .co-desc {
            font-family: Arial;
            font-weight: 400;
            font-size: 20px;
            line-height: 160%;
            letter-spacing: 0%;
            color: #000000;
        }

        /* CARD */
        .co-card {
            max-width: 350px;
            width: 100%;
            height: 489px;
            background: #F0F0F0;
            border-radius: 20px;
            padding: 25px;
            backdrop-filter: blur(84px);
        }

        .co-number {
            font-size: 60px;
            font-weight: 700;
            /* margin-bottom: 8px; */
            font-family: 'Plus Jakarta Sans', sans-serif;
            line-height: 150%;
            letter-spacing: -3px;
        }

        .co-small {
            font-size: 15px;
            /* margin-bottom: 12px; */
            font-weight: 500;
            font-family: 'Plus Jakarta Sans', sans-serif;
            line-height: 150%;
            color: #5C5D5F;
        }

        /* DIVIDER (70% black, 30% gray) */
        .co-divider {
            width: 100%;
            height: 6.65px;
            background: linear-gradient(to right,
                    rgba(0, 0, 0, 0.7) 70%,
                    #D9D9D9 30%);
            margin-top: 20px;
        }

        /* IMAGES */
        .co-img {
            width: 100%;
            max-width: 215px;
            height: 232px;
            border-radius: 12px;
            object-fit: cover;
        }



        /* BUTTON */
        .co-btn {
            margin-top: 30px;
            background: #0168A4;
            color: #FFF;
            padding: 16px 32px;
            font-size: 16px;
            font-weight: 700;
            border: none;
            border-radius: 70px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            cursor: pointer;
            width: 360px;
            height: 56px;
            line-height: 140%;
            font-family: 'Plus Jakarta Sans', sans-serif;
            margin-right: 30px;
            transition: all 0.4s ease-in-out;
        }

        .co-btn:hover {
            transform: translateY(-3px);
            background: #044970;

        }



        .values-container .section-title {
            font-family: Arial, Helvetica, sans-serif;
            line-height: 48px;
            font-size: 48px;
            font-weight: 700;
            /* margin-bottom: 40px; */
            text-align: start;

        }





        .about-sub-title {
            font-size: 32px;
            font-weight: 500;
            margin-bottom: 20px;
            font-family: Inter, sans-serif;
            color: #046DA0;
            width: 100%;
            max-width: 522px;
        }

        .desc {
            font-family: Arial;
            font-weight: 400;
            font-size: 20px;
            line-height: 160%;
            letter-spacing: 0%;
            color: #000000;


        }

        /* BUTTON */
        .talk-btn {
            display: flex;
            align-items: center;
            justify-content: center;
            align-items: center;
            background: #0168A4;
            color: #FFF;
            border-radius: 10px;
            font-size: 18px;
            border: none;
            font-weight: 500;
            cursor: pointer;
            transition: 0.3s ease;
            width: 100%;
            max-width: 198px;
            height: 43px;
            box-shadow: 0px 4px 4px #00000040;
            font-family: Inter, sans-serif;
            line-height: 100%;
            transition: all 0.5s ease-in-out;
            margin-top: 70px;
        }

        .talk-btn:hover {
            background: #01436b;
            transform: scale(1.03)
        }

        /* RIGHT IMAGE */
        .value-img {
            max-width: 428px;
            width: 100%;
            height: 419px;
            object-fit: cover;
            border-radius: 15px;
            border: 5px solid #0071A8;
            transition: all 0.5s ease-in-out;

        }

        .value-img:hover {
            transform: scale(1.03) translateY(-10px);
            transition: all 0.5s ease-in-out;
        }

        .card-box {
            max-width: 586px;
            width: 100%;
            height: 379px;
            padding: 30px;
            border: 3px solid #076FA1;
            border-radius: 30px;
            box-shadow: 0px 4px 14.5px #5BC3C4;
            background: #FFFFFF;
            margin-top: 40px;
            transition: all 0.5s ease-in-out;

        }

        .card-box:hover {
            transform: scale(1.03) translateY(-10px);
            transition: all 0.5s ease-in-out;
        }

        .about-card-title {
            font-size: 32px;
            font-weight: 700;
            margin-bottom: 15px;
            font-family: Inter, sans-serif;
            line-height: 48px;
            color: #0168A4;
            text-align: center;
        }

        .about-card-text {

            font-family: Arial;
            font-weight: 400;
            font-size: 20px;
            line-height: 160%;
            letter-spacing: 0%;
            color: #000000;
            text-align: center;
        }

        /* ======== about banner css ============ */

        .about-hero-section {
            background-image: url('/frontend/images/about/about-banner.png');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            height: 166px;
            /* margin-top: 20px; */
        }

        /* =================== custom section css ================== */


        /* Background Section */
        .custom-section {
            background-image: url('/frontend/images/about/about-banner2.jpg');
            background-size: cover;
            background-position: center;
            height: 567px;
            position: relative;
            /* padding: 30px; */
            margin-top: 50px;
        }

        /* Cards */
        .info-card {
            width: 537px;
            height: 280px;
            background: #004A6D99;
            color: #fff;
            padding: 30px;
            /* backdrop-filter: blur(3px); */
            position: absolute;
            border-top-right-radius: 5px;
            border-bottom-right-radius: 5px;


        }

        .info-card.card-right {
            width: 537px;
            height: 280px;
            background: #004A6D99;
            color: #fff;
            padding: 30px;
            /* backdrop-filter: blur(3px); */
            position: absolute;
            border-top-left-radius: 5px;
            border-bottom-left-radius: 5px;


        }

        /* Bottom Left Card */
        .card-left {
            bottom: 20px;
            left: 0px;
        }

        /* Top Right Card */
        .card-right {
            top: 20px;
            right: 0px;
        }

        .info-card h2 {
            font-size: 32px;
            font-weight: 700;
            margin-bottom: 15px;
            font-family: Inter, sans-serif;
            line-height: 48px;
            color: #FFFFFF;
        }

        .custom-section-heading {
            font-size: 48px;
            font-weight: 700;
            margin-bottom: 15px;
            font-family: Arial, Helvetica, sans-serif;
            line-height: 140%;
            color: #0D0D0D;
            text-align: center;
            margin-top: 40px;
        }

        .info-card p {
            font-size: 16px;
            font-weight: 700;
            margin-bottom: 15px;
            font-family: Arial, Helvetica, sans-serif;
            line-height: 160%;
            color: #FFFFFF;
        }

        /*================== company slider ========================*/
        .about-company-img {
            width: 238px;
            height: 416px;
        }

        @media(max-width:768px) {
            .card-box {}

            .about-card-text {
                font-size: 14px;

            }

            .desc {
                font-size: 13px;
            }

            .about-sub-title {
                font-size: 22px;

            }

            .co-desc {
                font-size: 15px;

            }

            .info-card.card-right {
                width: 400px;
                height: 230px;

            }

            .info-card {
                width: 420px;
                height: 230px;
            }

            .info-card h2 {
                font-size: 22px;

            }

            .info-card p {
                font-size: 14px;

            }


        }

        @media(max-width:767px) {
            .co-heading {
                font-size: 38px;

            }

            .co-small {
                font-size: 13px !important;

            }

            .info-card {
                width: 340px;
                height: 238px;
            }

            .info-card.card-right {
                width: 340px;
                height: 238px;
            }

            .info-card p {
                font-size: 11px;

            }

            .info-card h2 {
                font-size: 19px;
                ;
            }

            .about-hero-section {

                height: 58px;
            }
        }

        /* ---------- BUTTONS FIX ---------- */


        .about-card-img {
            display: block;
            margin: 0 auto;
            width: 100%;
            max-width: 238px;
            height: 416px;
            object-fit: contain;
            border-radius: 10px;
        }



        /* ========== brand slider ==================== */

        .brand-slider {
            padding: 30px 0;
            background: #fff;
            overflow: hidden;
            margin-top: 70px;
        }

        /* 👉 Flip container horizontally */
        .swiper {
            /* transform: scaleX(-1); */
        }

        /* 👉 Flip slides back to normal */
        .swiper-slide {
            /* transform: scaleX(-1); */
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 10px;
        }

        .brand-slider img {
            width: 100%;
            height: 120px;
            /* filter: grayscale(100%); */
            /* opacity: 0.8; */
            transition: 0.3s;
        }

        .brand-slider img:hover {
            /* filter: grayscale(0); */
            opacity: 1;
            transform: scale(1.05);

        }
    </style>
@endpush



@section('frontend-content')


    <section class="hero-detail-section">
        <div class="container py-5 text-center text-white">

            <h1 class="hero-title mb-3">About Us <span>Detail page </span> </h1>

            <p class="hero-description mx-auto mb-4">
                Discover the comprehensive range of specialized biomedical services we offer, designed to support your
                operational needs and technological advancement.
            </p>

            <div class="container py-5 text-center text-white">
                <div class="simple-breadcrumb-container text-start mx-auto">
                    <div class="simple-breadcrumb">

                        <a href="/" class="breadcrumb-link">Home</a>

                        <span class="breadcrumb-separator">|</span>

                        <span class="breadcrumb-active">About Us</span>
                    </div>
                </div>

            </div>

        </div>
    </section>

    <section class="company-overview">
        <div class="container">
            <div class="row g-5">

                <!-- LEFT COLUMN -->
                <div class="col-lg-6 ">
                    <h2 class="co-heading">Company Overview / <span>Who We Are</span> </h2>

                    <p class="co-desc">
                        nec Praesent libero, placerat nec non dignissim, viverra Lorem tempor vitae elit. viverra turpis
                        faucibus non. sit fringilla risus Nam ex nisl. fringilla Donec sit nisi nec Quisque Vestibulum
                        maximus Nunc ex non. volutpat vitae at, tempor ac amet, viverra tincidunt facilisis Sed orci
                        luctus Nam odio tincidunt urna. tincidunt sollicitudin.
                        maximus Nunc ex non. volutpat vitae at, tempor ac amet, viverra tincidunt facilisis Sed orci
                        luctus Nam odio tincidunt urna. tincidunt sollicitudin.
                    </p>

                    <p class="co-desc">
                        vel at orci elit tincidunt varius Donec orci dui in at, sapien orci tincidunt Morbi eget eu non.
                        facilisis odio luctus Nullam Morbi non faucibus viverra ipsum viverra facilisis ex ipsum sapien elit
                        porta ex faucibus odio orci diam Quisque turpis felis, placerat viverra Donec sollicitudin.
                        maximus Nunc ex non. volutpat vitae at, tempor ac amet, viverra tincidunt facilisis Sed orci
                        luctus Nam odio tincidunt urna. tincidunt sollicitudin.
                        luctus Nam odio tincidunt urna. tincidunt sollicitudin. luctus Nam odio tincidunt urna. tincidunt
                        sollicitudin. luctus Nam odio tincidunt urna. tincidunt sollicitudin.



                    </p>


                </div>

                <!-- RIGHT COLUMN -->
                <div class="col-lg-6">
                    <div class="d-flex gap-3 justify-content-center w-100">

                        <div class="w-50">
                            <div class="co-card">
                                <h3 class="co-number">230+</h3>

                                <p class="co-small">
                                    Lorem ipsum dolor sit amet consectetur adipiscing elit feugiat. Lorem ipsum dolor sit
                                    amet consectetur adipiscing elit feugiat.


                                </p>

                                <p class="co-small">
                                    Integer tincidunt arcu non massa tempor, sed pretium eros facilisis.
                                    Integer tincidunt arcu non massa tempor, sed pretium eros facilisis.

                                    .

                                </p>

                                <div class="co-divider"></div>
                            </div>
                        </div>
                        <div class=" d-flex flex-column gap-3">
                            <img src="{{ asset('frontend/images/about/about-1mg.png') }}" class="img-fluid co-img"
                                alt="ss">
                            <img src="{{ asset('frontend/images/about/about-img2.png') }}" class="img-fluid co-img"
                                alt="aa">

                        </div>
                    </div>


                    <!-- BUTTON -->
                    <div class="d-flex  justify-content-center w-75">
                        <button class="co-btn ">
                            Get Proposal <i class="bi bi-arrow-right ms-2"></i>
                        </button>
                    </div>

                </div>

            </div>
        </div>
    </section>

    {{-- =========== value container =============  --}}
    <div class="values-container container">
        <h2 class="section-title">Our Values</h2>

        <div class="row g-4">
            <!-- LEFT COLUMN -->
            <div class="col-lg-7 col-md-6">
                <h3 class="about-sub-title">Seamless Personalized Care by Mr Biomed Tech</h3>

                <p class="desc">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                    Nunc vitae viverra turpis, nec faucibus sapien. Vestibulum
                    maximus viverra ex non dapibus. Proin dignissim, justo vitae
                    tincidunt facilisis, erat orci faucibus nibh, pulvinar
                    elementum sapien nisl sed lorem.
                    maximus viverra ex non dapibus. Proin dignissim, justo vitae
                    tincidunt facilisis, erat orci faucibus nibh, pulvinar
                    elementum sapien nisl sed lorem.
                    tincidunt facilisis, erat orci faucibus nibh, pulvinar

                </p>

                <button class="talk-btn">
                    Talk to Expert
                </button>
            </div>

            <!-- RIGHT COLUMN (IMAGE) -->
            <div class="col-lg-5 col-md-6 text-center">
                <img src="{{ asset('frontend/images/rental/product-img.jpg') }}" class="value-img">

            </div>
        </div>

        <!-- BOTTOM 2 COLUMN CARDS -->
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <!-- VISION CARD -->
                <div class="card-box">
                    <h3 class="about-card-title">Our Vision</h3>
                    <p class="about-card-text">
                        Aenean sit amet nunc vitae justo interdum ultrices. Aliquam
                        sodales sapien vel quam posuere posuere. Sed maximus, ligula
                        vitae interdum facilisis, lorem nisl volutpat elit, sed
                        suscipit lacus orci eu nisi.Lorem ipsum dolor sit amet consectetur adipiscing elit feugiat. Lorem
                        ipsum dolor sit
                        .
                    </p>
                </div>

                <!-- MISSION CARD -->

            </div>
            <div class="col-lg-6 col-md-6">
                <div class="card-box">
                    <h3 class="about-card-title">Our Mission</h3>
                    <p class="about-card-text">
                        Quisque faucibus felis vitae elit consectetur, eget varius
                        lectus consectetur. Aliquam erat volutpat. Nullam mattis
                        mauris sed libero consectetur, vitae euismod sapien ultrices.Lorem ipsum dolor sit amet consectetur
                        adipiscing elit feugiat. Lorem ipsum dolor sit

                    </p>
                </div>
            </div>
        </div>
    </div>

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

                        <!-- CARD 1 -->
                        <div class="offer-card">
                            <img src="{{ asset('frontend/images/slider-img-1.png') }}" alt="card-im"
                                class="card-img img-fluid">
                            <h4 class="card-title">Repairing Services</h4>
                            <hr>
                            <p class="card-desc">High quality ECG machines for accurate monitoring.</p>
                            <button class="read-btn">Read More</button>
                        </div>

                        <!-- CARD 2 -->
                        <div class="offer-card">
                            <img src="{{ asset('frontend/images/slider-img-1.png') }}" alt="card-im"
                                class="card-img img-fluid">
                            <h4 class="card-title">Surgical Equipment </h4>
                            <hr>
                            <p class="card-desc">Advanced imaging technology for clear results.</p>
                            <button class="read-btn">Read More</button>
                        </div>

                        <!-- CARD 3 -->
                        <div class="offer-card">
                            <img src="{{ asset('frontend/images/slider-img-1.png') }}" alt="card-im"
                                class="card-img img-fluid">
                            <h4 class="card-title">Disposition Services</h4>
                            <hr>
                            <p class="card-desc">Portable ultrasound for quick examinations.</p>
                            <button class="read-btn">Read More</button>
                        </div>

                        <!-- CARD 4 -->
                        <div class="offer-card">
                            <img src="{{ asset('frontend/images/slider-img-1.png') }}" alt="card-im"
                                class="card-img img-fluid">
                            <h4 class="card-title">ICU Monitor</h4>
                            <hr>
                            <p class="card-desc">Real-time monitoring for critical patients.</p>
                            <button class="read-btn">Read More</button>
                        </div>

                        <!-- Duplicate first 4 cards for infinite loop -->
                        <div class="offer-card">
                            <img src="{{ asset('frontend/images/slider-img-1.png') }}" alt="card-im"
                                class="card-img img-fluid">
                            <h4 class="card-title">Medical Equipment </h4>
                            <hr>
                            <p class="card-desc">High quality ECG machines.</p>
                            <button class="read-btn">Read More</button>
                        </div>
                        <div class="offer-card">
                            <img src="{{ asset('frontend/images/slider-img-1.png') }}" alt="card-im"
                                class="card-img img-fluid">
                            <h4 class="card-title">X-ray Machine</h4>
                            <hr>
                            <p class="card-desc">Advanced imaging results.</p>
                            <button class="read-btn">Read More</button>
                        </div>
                        <div class="offer-card">
                            <img src="{{ asset('frontend/images/slider-img-1.png') }}" alt="card-im"
                                class="card-img img-fluid">
                            <h4 class="card-title">Ultrasound</h4>
                            <hr>
                            <p class="card-desc">Portable & fast.</p>
                            <button class="read-btn">Read More</button>
                        </div>
                        <div class="offer-card">
                            <img src="{{ asset('frontend/images/slider-img-1.png') }}" alt="card-im"
                                class="card-img img-fluid">
                            <h4 class="card-title">ICU Monitor</h4>
                            <hr>
                            <p class="card-desc">Critical monitoring.</p>
                            <button class="read-btn">Read More</button>
                        </div>

                    </div>
                </div>

                <!-- Next Button -->
                <button class="offer-next"><i class="bi bi-chevron-right"></i></button>
                {{-- pagination dot --}}
                <div class="offer-pagination"></div>


            </div>
        </div>
    </section>




    {{-- ===== about banner ======== --}}

    <section class="brand-s">
        <div class="brand-slider containe">
            <div class="swiper mySwiper">
                <div class="swiper-wrapper">

                    <div class="swiper-slide"><img src="{{ asset('frontend/images/rental/brand-logo1.png') }}"></div>
                    <div class="swiper-slide"><img src="{{ asset('frontend/images/rental/brand-logo2.png') }}"></div>
                    <div class="swiper-slide"><img src="{{ asset('frontend/images/rental/brand-logo3.png') }}"></div>
                    <div class="swiper-slide"><img src="{{ asset('frontend/images/rental/brand-logo4.png') }}"></div>
                    <div class="swiper-slide"><img src="{{ asset('frontend/images/rental/brand-logo5.jpg') }}"></div>
                    <div class="swiper-slide"><img src="{{ asset('frontend/images/rental/brand-logo6.jpg') }}"></div>
                    <div class="swiper-slide"><img src="{{ asset('frontend/images/rental/brand-logo7.png') }}"></div>
                    <div class="swiper-slide"><img src="{{ asset('frontend/images/rental/brand-logo8.png') }}"></div>
                    <div class="swiper-slide"><img src="{{ asset('frontend/images/rental/brand-logo9.png') }}"></div>
                    <div class="swiper-slide"><img src="{{ asset('frontend/images/rental/brand-logo10.png') }}"></div>

                </div>
            </div>
        </div>
    </section>

    {{-- ==== end --}}
    {{-- <section class="about-hero-section mt-3">

    </section> --}}


    {{-- ====== custom card ============= --}}
    <section>
        <div class="row">
            <h2 class="custom-section-heading">What We Do?</h2>
        </div>
        <section class="custom-section">
            <!-- Bottom Left Card -->
            <div class="info-card card-left">
                <h2>Repairing Services</h2>
                <p>
                    This is the description of the left card. You can write any text here.
                    This is the description of the left card. You can write any text here.
                    This is the description of the left card. You can write any text here.

                </p>
            </div>

            <!-- Top Right Card -->
            <div class="info-card card-right">
                <h2>Retired Assets</h2>
                <p>
                    This is the description of the right card. Customize it as you want.
                    This is the description of the left card. You can write any text here.
                    This is the description of the left card. You can write any text here.

                </p>
            </div>
        </section>

        <section class="custom-section">
            <!-- Bottom Left Card -->
            <div class="info-card card-left">
                <h2>Medical Equipment Repairing</h2>
                <p>
                    This is the description of the left card. You can write any text here.
                    This is the description of the left card. You can write any text here.
                    This is the description of the left card. You can write any text here.

                </p>
            </div>

            <!-- Top Right Card -->
            <div class="info-card card-right">
                <h2>Surgical Equipment Repairing</h2>
                <p>
                    This is the description of the right card. Customize it as you want.
                    This is the description of the left card. You can write any text here.
                    This is the description of the left card. You can write any text here.

                </p>
            </div>
        </section>
        <section class="custom-section">
            <!-- Bottom Left Card -->
            <div class="info-card card-left">
                <h2>Medical Imaging Repairing</h2>
                <p>
                    This is the description of the left card. You can write any text here.
                    This is the description of the left card. You can write any text here.
                    This is the description of the left card. You can write any text here.

                </p>
            </div>

            <!-- Top Right Card -->
            <div class="info-card card-right">
                <h2>Surgical Laser Services</h2>
                <p>
                    This is the description of the right card. Customize it as you want.
                    This is the description of the left card. You can write any text here.
                    This is the description of the left card. You can write any text here.

                </p>
            </div>
        </section>
    </section>
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








    <section class="offer-section my-5">
        <div class="container">

            <!-- Heading -->
            <h2 class="text-center offer-title">Company <span>Certifications</span> </h2>
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

                        <!-- CARD 1 -->
                        <div class="offer-card">
                            <img src="{{ asset('frontend/images/about/about-company.png') }}"
                                class="img-fluid about-card-img">


                        </div>

                        <!-- CARD 2 -->
                        <div class="offer-card">
                            <img src="{{ asset('frontend/images/about/about-company.png') }}"
                                class="img-fluid about-card-img">


                        </div>

                        <!-- CARD 3 -->
                        <div class="offer-card">
                            <img src="{{ asset('frontend/images/about/about-company.png') }}"
                                class="img-fluid about-card-img">


                        </div>

                        <!-- CARD 4 -->
                        <div class="offer-card">
                            <img src="{{ asset('frontend/images/about/about-company.png') }}"
                                class="img-fluid about-card-img">


                        </div>

                        <!-- Duplicate first 4 cards for infinite loop -->
                        <div class="offer-card">
                            <img src="{{ asset('frontend/images/about/about-company.png') }}"
                                class="img-fluid about-card-img">


                        </div>
                        <div class="offer-card">
                            <img src="{{ asset('frontend/images/about/about-company.png') }}"
                                class="img-fluid about-card-img">


                        </div>
                        <div class="offer-card">
                            <img src="{{ asset('frontend/images/about/about-company.png') }}"
                                class="img-fluid about-card-img">


                        </div>
                        <div class="offer-card">
                            <img src="{{ asset('frontend/images/about/about-company.png') }}"
                                class="img-fluid about-card-img">


                        </div>

                    </div>
                </div>

                <!-- Next Button -->
                <button class="offer-next"><i class="bi bi-chevron-right"></i></button>
                {{-- pagination dot --}}
                <div class="offer-pagination"></div>


            </div>
        </div>
    </section>



    {{-- ================ cta section =================== --}}
    <section class="cta-contact-section mt-5">
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
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <script>
        var swiper = new Swiper(".mySwiper", {
            slidesPerView: 6,
            spaceBetween: 50,
            loop: true,
            speed: 3000, // continuous smooth speed
            autoplay: {
                delay: 0, // no pause
                disableOnInteraction: false
            },
            allowTouchMove: true,

            breakpoints: {
                320: {
                    slidesPerView: 2
                },
                480: {
                    slidesPerView: 3
                },
                768: {
                    slidesPerView: 4
                },
                1024: {
                    slidesPerView: 6
                }
            }
        });

        // Hover Pause
        const swiperEl = document.querySelector(".mySwiper");
        swiperEl.addEventListener("mouseenter", () => swiper.autoplay.stop());
        swiperEl.addEventListener("mouseleave", () => swiper.autoplay.start());
    </script>
@endpush
