@extends('frontend.layouts.frontend')

@section('title', 'services')

@push('frontend-styles')
    <style>
        /* ========================service page css ======================================== */
        .hero-detail-section {
            background: linear-gradient(to right, #006A9E 60%, #A5CDE0);
            padding-top: 50px;
            padding-bottom: 80px;
            height: 351px;
        }

        .hero-detail-section .hero-title {
            font-family: Arial, sans-serif;
            font-size: 50px;
            font-weight: 700;
            color: white;
            line-height: 120%;
        }

        .hero-title span {
            color: #000000;
        }

        .hero-detail-section .hero-description {
            font-size: 16px;
            font-weight: 700;
            max-width: 800px;
            line-height: 160%;
            font-family: Arial, sans-serif;

        }

        .simple-breadcrumb-container {
            max-width: 1200px;
            margin: 0 auto;
            text-align: left;
        }

        .simple-breadcrumb {
            display: flex;
            align-items: center;
            font-family: Inter, sans-serif;
            font-size: 12px;
            font-weight: 500;
        }

        .breadcrumb-link {
            color: #0D0D0D;
            text-decoration: none;
            transition: color 0.3s;
        }

        .breadcrumb-link:hover {
            color: #e3eff4;
        }

        .breadcrumb-separator {
            color: #0D0D0D;
            font-size: 12px;
            margin: 0 8px;
        }

        .breadcrumb-active {
            color: #ffffff;
            font-weight: 600;
        }

        /* =======circle section ================ */


        .hero-circles-section {
            /* min-height: 750px; */
            display: flex;
            flex-direction: column;

            background-color: #ffffff;
            position: relative;
            overflow: hidden;
        }

        .circle-one {
            background: #EBE9E980;
            width: 1413px;
            height: 1111px;
            border-radius: 50%;
            position: absolute;
            top: -200px;
            left: -452px;
            z-index: 0;
        }

        .circle-two {
            background: #EBE9E980;
            width: 1406.71px;
            height: 548.92px;
            border-radius: 50%;
            position: absolute;
            left: 390px;
            top: 700px;
            transform: rotate(-18.33deg);
            z-index: 0;
        }

        .hero-circles-section .container {
            z-index: 1;
        }

        .hero-main-heading {
            font-family: Inter, sans-serif;
            font-size: 32px;
            color: #0D0D0D;
            font-weight: 600;
            line-height: 140%;
        }

        .hero-main-heading span {
            color: #0071A8;
        }

        .hero-description {
            font-size: 20px;
            font-weight: 400;
            font-family: Arial, Helvetica, sans-serif;
            line-height: 160%;
            margin-bottom: 0px;
        }


        /* Base Styles for Large Screens (Aapki original settings) */
        .hero-image-top {
            width: 593px;
            height: 323px;
            display: block;
            border-radius: 20px !important;
            box-shadow: 0px 0px 20px #0071A8 !important;
            object-fit: cover;
            /* margin-top: 70px; */
        }

        .hero-image-bottom {
            width: 610px;
            height: 336px;
            display: block;
            border-radius: 20px !important;
            box-shadow: 0px 0px 20px #0071A8 !important;
            object-fit: cover;
            margin-top: 30px;
        }

        /* --- Responsive Adjustments --- */
        @media (max-width: 991.98px) {
            .hero-circles-section {
                min-height: 600px;
            }

            .hero-main-heading {
                font-size: 2rem;
                text-align: center;
            }

            .hero-description {
                text-align: center;
            }

            /* Circles ko mobile par chota kar dein ya hide kar dein */
            .circle-one {
                width: 800px;
                height: 800px;
                top: 100px;
                left: -400px;
            }

            .circle-two {
                width: 700px;
                height: 700px;
                bottom: -350px;
                right: -350px;
            }
        }

        @media (max-width: 767.98px) {

            /* Very small devices par circles ko hide karna behtar hai performance aur simplicity ke liye */
            .circle-one,
            .circle-two {
                display: none;
            }
        }

        .medical-equipment-section {
            z-index: 2;
        }

        .equipment-heading {
            font-size: 48px;
            font-weight: 600;
            color: #0D0D0D;
            font-family: Inter, sans-serif;
            /* max-width: 900px; */
        }

        .equipment-heading span {
            color: #0071A8;
        }

        .equipment-list {
            list-style: none;
            padding-left: 0;
        }

        .equipment-list li {
            font-size: 22px;
            margin-bottom: 12px;
            display: flex;
            align-items: center;
            color: #121212B2;
            font-weight: 700;
            z-index: 2;
            font-family: Inter, sans-serif;
        }

        .yes-icon {
            color: #0168A4;
            font-size: 40px;
            margin-right: 10px;
            z-index: 2;
        }


        /* ==== biomed-section ==============*/
        .biomed-section {
            padding: 80px 0;
            font-family: Arial, sans-serif;
        }

        .main-heading {
            font-size: 40px;
            font-weight: 700;
            text-align: center;
            font-family: Arial, Helvetica, sans-serif;
        }

        .main-desc {
            text-align: center;
            max-width: 750px;
            margin: 0 auto;
            font-size: 18px;
            line-height: 1.6;
        }

        /* SERVICE CARDS */
        .service-card {
            width: 650px;
            height: 197px;
            background: white;
            padding: 20px;
            border-radius: 20px;
            margin-bottom: 40px;
            box-shadow: 0px 0px 20px #0071A8;
        }

        .service-card h4 {
            font-size: 32px;
            margin: 0;
            font-weight: 700;
            text-align: center;
            color: #000000;
            font-family: Arial, Helvetica, sans-serif;
            line-height: 160%;
        }

        .service-card p {
            font-size: 16px;
            color: #121212B2;
            font-family: Arial, Helvetica, sans-serif;
            line-height: 160%;
            font-weight: 400;

        }

        /* RIGHT SIDE IMAGES */
        .infoo-img {
            width: 507px;
            height: 277px;
            object-fit: cover;
            border-radius: 20px;
            /* margin-bottom: 90px; */
            display: block;
            margin: 0 auto 90px auto;
            box-shadow: 0px 0px 20px #0071A8
        }

        /* RENTAL SECTION */
        .rental-heading {
            font-size: 48px;
            font-weight: 700;
            margin-bottom: 25px;
            text-align: center;
            line-height: 140%;
            color: #0D0D0D;
            font-family: Arial, Helvetica, sans-serif;
        }

        .rental-heading span {
            color: #0071A8;
        }

        /* RENTAL CARD */
        .rental-card {
            background: #fff;
            border-radius: 12px;
            padding: 20px;
            /* box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.10); */
            margin-bottom: 25px;
        }

        .rental-card p {
            font-size: 20px;
            font-weight: 700;
            line-height: 160%;
            color: #121212B2;
            font-family: Arial, Helvetica, sans-serif;
            width: 528px;
            letter-spacing: 0;
            /* height: 79px; */
        }

        .rental-h4 {
            font-size: 40px;
            font-weight: 500;
            margin-bottom: 25px;
            /* text-align: center; */
            line-height: 140%;
            color: #0D0D0D;
            font-family: Inter, sans-serif;
        }

        .rental-h4 span {
            font-size: 40px;
            font-weight: 500;
            margin-bottom: 25px;
            text-align: center;
            line-height: 140%;
            color: #0071A8;
            font-family: Inter, sans-serif;
        }

        .rental-img {
            width: 200px;
            height: 200px;
            object-fit: cover;
            border-radius: 12px;
            margin: 10px 0;
        }

        .btn-get {
            background: #0168A4;
            color: white;
            border: none;
            border-radius: 10px;
            margin-top: 20px;
            font-weight: 500;
            cursor: pointer;
            width: 142px;
            height: 43px;
            box-shadow: 0px 4px 4px #00000040;
            font-size: 18px;
            line-height: 100%;

            display: flex;
            align-items: center;
            justify-content: center;
        }

        .btn-get:hover {
            background: #005a82;
        }

        /* WHY LIST */
        .why-heading {
            font-size: 20px;
            font-weight: 900;
            line-height: 160%;
            font-family: Arial, Helvetica, sans-serif;
            color: #121212B2;
        }

        .why-list {
            margin-left: 9px;
            padding-left: 9px;
        }

        .why-list li {
            font-size: 20px;
            font-weight: 700;
            line-height: 160%;
            color: #121212B2;
            font-family: Arial, Helvetica, sans-serif;
            width: 528px;
            letter-spacing: 0;
            margin-bottom: 10px;

        }
    </style>
@endpush

@section('frontend-content')

    <section class="hero-detail-section">
        <div class="container py-5 text-center text-white">

            <h1 class="hero-title mb-3">Mr Biomed <span>Services Detail page</span> </h1>

            <p class="hero-description mx-auto mb-4">
                Discover the comprehensive range of specialized biomedical services we offer, designed to support your
                operational needs and technological advancement.
            </p>

            <div class="container py-5 text-center text-white">
                <div class="simple-breadcrumb-container text-start mx-auto">
                    <div class="simple-breadcrumb">

                        <a href="/" class="breadcrumb-link">Home</a>

                        <span class="breadcrumb-separator">|</span>

                        <span class="breadcrumb-active">Mr Biomed Services</span>
                    </div>
                </div>

            </div>

        </div>
    </section>


    <section class="hero-circles-section position-relative overflow-hidden">

        <div class="circle-one"></div>
        <div class="circle-two"></div>


        <div class="container py-5 py-md-6 position-relative z-1">
            <div class="row ">

                <div class="col-lg-6 col-md-6 ">
                    <h1 class="hero-main-heading  mb-4">
                        MR <span> BIOMED</span> - Group Your Trusted BIO-Medical Services Provider
                    </h1>
                    <p class="hero-description ">
                        Libero diam auctor tristique hendrerit in eu vel id. Nec leo amet suscipit nulla. Nullam vitae sit
                        tempus diam.

                    </p>
                    <p class="hero-description ">
                        Libero diam auctor tristique hendrerit in eu vel id. Nec leo amet suscipit nulla. Nullam vitae sit
                        tempus diam.

                    </p>
                    <p class="hero-description ">
                        Libero diam auctor tristique hendrerit in eu vel id. Nec leo amet suscipit nulla. Nullam vitae sit
                        tempus diam.

                    </p>
                    <p class="hero-description ">
                        Libero diam auctor tristique hendrerit in eu vel id. Nec leo amet suscipit nulla. Nullam vitae sit
                        tempus diam.

                    </p>
                    <p class="hero-description ">
                        Libero diam auctor tristique hendrerit in eu vel id. Nec leo amet suscipit nulla. Nullam vitae sit
                        tempus diam.

                    </p>

                    <p class="hero-description ">
                        Libero diam auctor tristique hendrerit in eu vel id. Nec leo amet suscipit nulla. Nullam vitae sit
                        tempus diam.

                    </p>
                    <p class="hero-description ">
                        Libero diam auctor tristique hendrerit in eu vel id. Nec leo amet suscipit nulla. Nullam vitae sit
                        tempus diam.

                    </p>
                </div>


                <div class="col-lg-6 col-md-6 text-center ">
                    <div class="image-stack d-inline-block position-relative justify-content-center">
                        <img src="{{ asset('frontend/images/service/services-img-1.png') }}" alt="Medical Equipment 1"
                            class="img-fluid hero-image-top ">
                        <img src="{{ asset('frontend/images/service/services-img-2.jpg') }}" alt="Medical Equipment 2"
                            class="img-fluid hero-image-bottom ">
                    </div>
                </div>

            </div>
        </div>


        <section class="medical-equipment-section py-5">
            <div class="container">

                <!-- Heading -->

                <div class="row">
                    <div class="col-8 mx-auto">
                        <h2 class="equipment-heading text-center mb-5">
                            Our Wide Selection of <span>Medical Equipment Includes</span>
                        </h2>
                    </div>
                </div>
                <!-- 3 Columns -->
                <div class="row">

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

    </section>


    <section
        style="
        background-image: url('{{ asset('frontend/images/service/service-banner-img.png') }}');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        padding: 80px 0;
        height:293px;
    ">
        {{-- <div class="container text-center text-white">

            <h2 style="font-size:48px; font-weight:700; margin-bottom:25px;">
                This is a Section With Background Image
            </h2>

            <p style="font-size:20px; max-width:750px; margin:0 auto;">
                Add your content here. This section uses inline CSS to set a beautiful background image.
                It's fully responsive and works with Bootstrap.
            </p>

            <button class="btn btn-light mt-4 px-4 py-2 fw-bold">
                Learn More
            </button>

        </div> --}}
    </section>

    <section class="biomed-section">
        <div class="container">

            <!-- MAIN HEADING -->
            <div class="row">
                <div class="col-8 mx-auto">
                    <h2 class="main-heading">
                        MR BIOMED - Group Your Trusted BIO-Medical Services Provider
                    </h2>

                    <p class="main-desc">
                        We provide high-quality biomedical services, ensuring accuracy, safety, and efficiency.
                        Our team is committed to delivering top-tier maintenance, inspection, and rental services
                        tailored to meet your healthcare facility needs. Your trust is our top priority.
                    </p>
                </div>
            </div>

            <div class="row mt-5">

                <!-- LEFT COLUMN - CARDS -->
                <div class="col-lg-6 col-md-6">
                    <div class="service-card">
                        <h4>Preventive Maintenance</h4>
                        <p>Regular maintenance to ensure optimal equipment performance.Regular maintenance to ensure optimal
                            equipment performance.Regular maintenance to ensure optimal equipment performance.</p>
                    </div>

                    <div class="service-card">
                        <h4>Preventive Maintenance</h4>
                        <p>Ensuring equipment longevity and safety.Regular maintenance to ensure optimal equipment
                            performance.Regular maintenance to ensure optimal equipment performance.</p>
                    </div>

                    <div class="service-card">
                        <h4>Preventive Maintenance</h4>
                        <p>Reduced breakdowns with professional servicing.Regular maintenance to ensure optimal equipment
                            performance.Regular maintenance to ensure optimal equipment performance.</p>
                    </div>

                    <div class="service-card">
                        <h4>Preventive Maintenance</h4>
                        <p>Accurate diagnostics and calibration.Regular maintenance to ensure optimal equipment
                            performance.Regular maintenance to ensure optimal equipment performance.</p>
                    </div>

                    <div class="service-card">
                        <h4>Preventive Maintenance</h4>
                        <p>Complete maintenance solutions for all devices.Regular maintenance to ensure optimal equipment
                            performance.Regular maintenance to ensure optimal equipment performance.</p>
                    </div>
                </div>

                <!-- RIGHT COLUMN - IMAGES -->
                <div class="col-lg-6 col-md-6 text-center">
                    <img src="{{ asset('frontend/images/service/services-img-1.png') }}" alt="Medical Equipment 1"
                        class="img-fluid infoo-img">

                    <img src="{{ asset('frontend/images/service/services-img-1.png') }}" alt="Medical Equipment 1"
                        class="img-fluid infoo-img ">
                    <img src="{{ asset('frontend/images/service/services-img-1.png') }}" alt="Medical Equipment 1"
                        class="img-fluid infoo-img ">
                </div>

            </div>

            <!-- RENTAL EQUIPMENT SECTION -->
            <div class="rental-section mt-5">

                <h3 class="rental-heading">Rental <span>Equipment</span> </h3>

                <div class="row">

                    <!-- LEFT COLUMN -->
                    <div class="col-lg-6">

                        <div class="rental-card">
                            <h4 class="rental-h4">Product <span>Name</span> </h4>
                            <img src="{{ asset('frontend/images/service/service-rental-img.png') }}" class="rental-img"
                                alt="">
                            <p>Durable and comfortable wheelchair for patientsDurable and comfortable wheelchair for
                                patientDurable and comfortable wheelchair for patientDurable and comfortable wheelchair for
                                patientDurable and comfortable wheelchair for patientDurable and comfortable wheelchair for
                                patient.</p>

                            <h4 class="why-heading mt-4">Why Perform an Electrical Safety Inspection?</h4>

                            <ul class="why-list">
                                <li>Ensures equipment is operating safely</li>
                                <li>Reduces the risk of electrical hazards</li>
                                <li>Improves equipment life and reliability</li>
                                <li>Required for compliance and certification</li>
                            </ul>
                            <button class="btn-get">Get Now</button>
                        </div>

                        <div class="rental-card">
                            <h4 class="rental-h4">Product <span>Name</span> </h4>
                            <img src="{{ asset('frontend/images/service/service-rental-img.png') }}" class="rental-img"
                                alt="">
                            <p>Durable and comfortable wheelchair for patientsDurable and comfortable wheelchair for
                                patientDurable and comfortable wheelchair for patientDurable and comfortable wheelchair for
                                patientDurable and comfortable wheelchair for patientDurable and comfortable wheelchair for
                                patient.</p>

                            <h4 class="why-heading mt-4">Why Perform an Electrical Safety Inspection?</h4>

                            <ul class="why-list">
                                <li>Ensures equipment is operating safely</li>
                                <li>Reduces the risk of electrical hazards</li>
                                <li>Improves equipment life and reliability</li>
                                <li>Required for compliance and certification</li>
                            </ul>
                            <button class="btn-get">Get Now</button>
                        </div>


                    </div>

                    <!-- RIGHT COLUMN -->
                    <div class="col-lg-6">

                        <div class="rental-card">

                            <h4 class="rental-h4">Product <span>Name</span> </h4>
                            <img src="{{ asset('frontend/images/service/service-rental-img.png') }}" class="rental-img"
                                alt="">
                            <p>Durable and comfortable wheelchair for patientsDurable and comfortable wheelchair for
                                patientDurable and comfortable wheelchair for patientDurable and comfortable wheelchair for
                                patientDurable and comfortable wheelchair for patientDurable and comfortable wheelchair for
                                patient.</p>

                            <h4 class="why-heading mt-4">Why Perform an Electrical Safety Inspection?</h4>

                            <ul class="why-list">
                                <li>Ensures equipment is operating safely</li>
                                <li>Reduces the risk of electrical hazards</li>
                                <li>Improves equipment life and reliability</li>
                                <li>Required for compliance and certification</li>
                            </ul>
                            <button class="btn-get">Get Now</button>
                        </div>

                        <div class="rental-card">
                            <h4 class="rental-h4">Product <span>Name</span> </h4>
                            <img src="{{ asset('frontend/images/service/service-rental-img.png') }}" class="rental-img"
                                alt="">
                            <p>Durable and comfortable wheelchair for patientsDurable and comfortable wheelchair for
                                patientDurable and comfortable wheelchair for patientDurable and comfortable wheelchair for
                                patientDurable and comfortable wheelchair for patientDurable and comfortable wheelchair for
                                patient.</p>

                            <h4 class="why-heading mt-4">Why Perform an Electrical Safety Inspection?</h4>

                            <ul class="why-list">
                                <li>Ensures equipment is operating safely</li>
                                <li>Reduces the risk of electrical hazards</li>
                                <li>Improves equipment life and reliability</li>
                                <li>Required for compliance and certification</li>
                            </ul>
                            <button class="btn-get">Get Now</button>
                        </div>

                    </div>

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
                        <!-- FAQ Item 1 -->
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
                        <!-- FAQ Item 2 -->
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
                        <!-- FAQ Item 3 -->
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
@endpush
