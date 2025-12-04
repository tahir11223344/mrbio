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
            width: 266px;
            height: 117px;
            background-color: #F0F0F0;
            border: 4px solid #FE0000;
            border-radius: 25px;
            padding: 15px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 40px;
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

            <h1 class="hero-title mb-3 fade-right">Repair <span> Services Main page </span> </h1>
            <p class="hero-description mx-auto mb-4 fade-left">
                Discover the comprehensive range of specialized biomedical services we offer, designed to support your
                operational needs and technological advancement.
            </p>

            <div class="container py-5 text-center text-white">
                <div class="simple-breadcrumb-container text-start mx-auto">
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
            <source src="{{ asset('frontend/images/repair/WhatsApp Video 2025-11-26 at 12.40.40 AM.mp4') }}"
                type="video/mp4">
        </video>
        <div class="container">
            <div class="row">
                <div class="col-md-6 mx-auto ">

                    <div class="repaire-content text-center">
                        <h2 class="fade-left">Mr Biomed tech Medical Equipment <span> Repair And Maintenance</span></h2>
                        <p class="fade-right">
                            We provide professional repair and maintenance services for all types of medical equipment.
                            High-quality service with expert biomedical technicians.
                        </p>
                        <a href="#" class="service-btn">Schedule Your Service Today</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ============ x ray section ===================== --}}

    <section class="xray-section py-5">

        <div class="container-fluid xray-box p-4 mt-5">
            <div class="container text-center mb-5">
                <div class="row">
                    <div class="col-md-8 mx-auto">
                        <h2 class="main-heading">Medical Equipment Calibration <span>and Repairing Services </span> </h2>
                        <p class=" xray-desc"> centers.quipment available for hospitals and emergency healthcare centers.
                            centers.quipment available for hospitals and emergency healthcare centersemergency healthcare
                            centers.
                            centers.quipment available for hospitals and emergency healthcare centers</p>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row g-4">

                    <!-- Card 1 -->
                    <div class="col-lg-3 col-md-6">
                        <div class="xray-card p-3">
                            <h3 class="xray-title ">
                                X-Ray Rent, Sales & Repair Services in Austin TX
                            </h3>

                            <p class="xray-desc ">
                                Affordable X-Ray equipment suitable for clinics, hospitals and home-based centers.
                                Quality X-Ray equipment available for hospitals and emergency healthcare
                                centers.quipment available for hospitals and emergency healthcare centers.
                                centers.quipment available for hospitals and emergency healthcare centers
                            </p>

                            <button class="xray-btn">Read More</button>
                        </div>
                    </div>

                    <!-- Card 2 -->
                    <div class="col-lg-3 col-md-6">
                        <div class="xray-card p-3">
                            <h3 class="xray-title">X-Ray Rent, Sales & Repair Services in Austin TX</h3>
                            <p class="xray-desc">
                                Affordable X-Ray equipment suitable for clinics, hospitals, and home-based healthcare
                                centers.Libero diam auctor tristique hendrerit in eu vel id. Nec leo amet suscipit
                                nulla. Nullam vitae sit tempus diam. Quality X-Ray equipment available for hospitals and
                                emergency healthcare centers.Libero


                            </p>
                            <button class="xray-btn">Read More</button>
                        </div>
                    </div>


                    <!-- Card 3 -->
                    <div class="col-lg-3 col-md-6">
                        <div class="xray-card p-3">
                            <h3 class="xray-title color-animate">
                                <span> X-Ray Rent, Sales & Repair Services </span>
                                <span> in Austin TX </span>
                                <span> (Best Healthcare Solutions) </span>
                            </h3>

                            <p class="xray-desc color-animate">
                                <span>Affordable X-Ray equipment suitable for clinics, hospitals, and home-based
                                    healthcare centers.</span>
                                <span>Quality X-Ray equipment available for hospitals and emergency centers.</span>
                                <span>Reliable & fast services with professional support.</span>
                            </p>

                            <button class="xray-btn">Read More</button>
                        </div>
                    </div>

                    <!-- Card 4 -->
                    <div class="col-lg-3 col-md-6">
                        <div class="xray-card p-3">
                            <h3 class="xray-title">X-Ray Rent, Sales & Repair Services in Austin TX</h3>
                            <p class="xray-desc">
                                Affordable X-Ray equipment suitable for clinics, hospitals, and home-based healthcare
                                centers.Libero diam auctor tristique hendrerit in eu vel id. Nec leo amet suscipit
                                nulla. Nullam vitae sit tempus diam. Quality X-Ray equipment available for hospitals and
                                emergency healthcare centers.Libero
                            </p>
                            <button class="xray-btn">Read More</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <section class="xray-section py-5">

        <div class="container-fluid xray-box p-4 mt-5">
            <div class="container text-center mb-5">
                <div class="row">
                    <div class="col-md-8 mx-auto">
                        <h2 class="main-heading">X-Ray <span>Rent, Sales & Repairing Services</span> </h2>
                        <p class=" xray-desc"> centers.quipment available for hospitals and emergency healthcare centers.
                            centers.quipment available for hospitals and emergency healthcare centersemergency healthcare
                            centers.
                            centers.quipment available for hospitals and emergency healthcare centers</p>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row g-4">

                    <!-- Card 1 -->
                    <div class="col-lg-3 col-md-6">
                        <div class="xray-card p-3">
                            <h3 class="xray-title ">
                                X-Ray Rent, Sales & Repair Services in Austin TX
                            </h3>

                            <p class="xray-desc ">
                                Affordable X-Ray equipment suitable for clinics, hospitals and home-based centers.
                                Quality X-Ray equipment available for hospitals and emergency healthcare
                                centers.quipment available for hospitals and emergency healthcare centers.
                                centers.quipment available for hospitals and emergency healthcare centers
                            </p>

                            <button class="xray-btn">Read More</button>
                        </div>
                    </div>

                    <!-- Card 2 -->
                    <div class="col-lg-3 col-md-6">
                        <div class="xray-card p-3">
                            <h3 class="xray-title">X-Ray Rent, Sales & Repair Services in Austin TX</h3>
                            <p class="xray-desc">
                                Affordable X-Ray equipment suitable for clinics, hospitals, and home-based healthcare
                                centers.Libero diam auctor tristique hendrerit in eu vel id. Nec leo amet suscipit
                                nulla. Nullam vitae sit tempus diam. Quality X-Ray equipment available for hospitals and
                                emergency healthcare centers.Libero


                            </p>
                            <button class="xray-btn">Read More</button>
                        </div>
                    </div>


                    <!-- Card 3 -->
                    <div class="col-lg-3 col-md-6">
                        <div class="xray-card p-3">
                            <h3 class="xray-title color-animate">
                                <span> X-Ray Rent, Sales & Repair Services </span>
                                <span> in Austin TX </span>
                                <span> (Best Healthcare Solutions) </span>
                            </h3>

                            <p class="xray-desc color-animate">
                                <span>Affordable X-Ray equipment suitable for clinics, hospitals, and home-based
                                    healthcare centers.</span>
                                <span>Quality X-Ray equipment available for hospitals and emergency centers.</span>
                                <span>Reliable & fast services with professional support.</span>
                            </p>

                            <button class="xray-btn">Read More</button>
                        </div>
                    </div>

                    <!-- Card 4 -->
                    <div class="col-lg-3 col-md-6">
                        <div class="xray-card p-3">
                            <h3 class="xray-title">X-Ray Rent, Sales & Repair Services in Austin TX</h3>
                            <p class="xray-desc">
                                Affordable X-Ray equipment suitable for clinics, hospitals, and home-based healthcare
                                centers.Libero diam auctor tristique hendrerit in eu vel id. Nec leo amet suscipit
                                nulla. Nullam vitae sit tempus diam. Quality X-Ray equipment available for hospitals and
                                emergency healthcare centers.Libero
                            </p>
                            <button class="xray-btn">Read More</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <section class="xray-section py-5">

        <div class="container-fluid xray-box p-4 mt-5">
            <div class="container text-center mb-5">
                <div class="row">
                    <div class="col-md-8 mx-auto">
                        <h2 class="main-heading">C-Arm <span>Rent, Sales, and Repairing Services</span> </h2>
                        <p class="xray-desc"> centers.quipment available for hospitals and emergency healthcare centers.
                            centers.quipment available for hospitals and emergency healthcare centersemergency healthcare
                            centers.
                            centers.quipment available for hospitals and emergency healthcare centers</p>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row g-4 justify-content-center">

                    <!-- Card 1 -->
                    <div class="col-lg-3 col-md-6">
                        <div class="xray-card p-3">
                            <h3 class="xray-title reveal-lines">
                                X-Ray Rent, Sales & Repair Services in Austin TX
                            </h3>

                            <p class="xray-desc ">
                                Affordable X-Ray equipment suitable for clinics, hospitals and home-based centers.
                                Quality X-Ray equipment available for hospitals and emergency healthcare
                                centers.quipment available for hospitals and emergency healthcare centers.
                                centers.quipment available for hospitals and emergency healthcare centers
                            </p>

                            <button class="xray-btn">Read More</button>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="xray-card p-3">
                            <h3 class="xray-title ">
                                X-Ray Rent, Sales & Repair Services in Austin TX
                            </h3>

                            <p class="xray-desc ">
                                Affordable X-Ray equipment suitable for clinics, hospitals and home-based centers.
                                Quality X-Ray equipment available for hospitals and emergency healthcare
                                centers.quipment available for hospitals and emergency healthcare centers.
                                centers.quipment available for hospitals and emergency healthcare centers
                            </p>

                            <button class="xray-btn">Read More</button>
                        </div>
                    </div>
                    <!-- Card 2 -->
                    <div class="col-lg-3 col-md-6">
                        <div class="xray-card p-3">
                            <h3 class="xray-title">X-Ray Rent, Sales & Repair Services in Austin TX</h3>
                            <p class="xray-desc">
                                Affordable X-Ray equipment suitable for clinics, hospitals, and home-based healthcare
                                centers.Libero diam auctor tristique hendrerit in eu vel id. Nec leo amet suscipit
                                nulla. Nullam vitae sit tempus diam. Quality X-Ray equipment available for hospitals and
                                emergency healthcare centers.Libero


                            </p>
                            <button class="xray-btn">Read More</button>
                        </div>
                    </div>


                    <!-- Card 3 -->
                    <div class="col-lg-3 col-md-6">
                        <div class="xray-card p-3">
                            <h3 class="xray-title color-animate">
                                <span> X-Ray Rent, Sales & Repair Services </span>
                                <span> in Austin TX </span>
                                <span> (Best Healthcare Solutions) </span>
                            </h3>

                            <p class="xray-desc color-animate">
                                <span>Affordable X-Ray equipment suitable for clinics, hospitals, and home-based
                                    healthcare centers.</span>
                                <span>Quality X-Ray equipment available for hospitals and emergency centers.</span>
                                <span>Reliable & fast services with professional support.</span>
                            </p>

                            <button class="xray-btn">Read More</button>
                        </div>
                    </div>

                    <!-- Card 4 -->
                    <div class="col-lg-3 col-md-6">
                        <div class="xray-card p-3">
                            <h3 class="xray-title">X-Ray Rent, Sales & Repair Services in Austin TX</h3>
                            <p class="xray-desc">
                                Affordable X-Ray equipment suitable for clinics, hospitals, and home-based healthcare
                                centers.Libero diam auctor tristique hendrerit in eu vel id. Nec leo amet suscipit
                                nulla. Nullam vitae sit tempus diam. Quality X-Ray equipment available for hospitals and
                                emergency healthcare centers.Libero
                            </p>
                            <button class="xray-btn">Read More</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    {{-- ======================== special section ===================== --}}

    <section class="special-section">
        <div class="container">
            <h2 class="special-section-title">Specialized Services in <span>Mr biomed Tech, TX</span> </h2>

            <div class="card-wrapper">
                <div class="service-card">
                    <h3>ipsum illo maxime? Accusamus repellendus eveniet</h3>
                </div>

                <div class="service-card">
                    <h3>Anesthesia Machine Repairing and Certification </h3>
                </div>

                <div class="service-card">
                    <h3>IV Pump Services</h3>
                </div>

                <div class="service-card">
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

    {{-- =========== oem section =========== --}}

    <section class="oem-trust-section py-5">
        <div class="container">
            <h2 class="text-center mb-5 section-title">Why OEMs Trust <span>Mr Biomed Tech</span> </h2>

            <div class="row g- justify-content-center mx-5">

                <!-- CARD 1 -->
                <div class="col-lg-4 col-md-6 justify-content-center">
                    <div class="oem-card">
                        <div class="oem-img-box">
                            <img src="{{ asset('frontend/images/chief-img.jpg') }}" alt="oem-img"
                                class="oem-img img-fluid">
                            <h4 class="oem-card-title">High Quality Equipment</h4>
                        </div>

                        <p class="oem-desc">
                            We provide top-notch medical equipment that meets international standards.
                        </p>

                        <ul class="oem-list">
                            <li>ISO certified products</li>
                            <li>Durability guaranteed</li>
                            <li>Trusted by hospitals</li>
                        </ul>
                    </div>
                </div>

                <!-- CARD 2 -->
                <div class="col-lg-4 col-md-6 justify-content-center">
                    <div class="oem-card">
                        <div class="oem-img-box">
                            <img src="{{ asset('frontend/images/chief-img.jpg') }}" alt="oem-img"
                                class="oem-img img-fluid">

                            <h4 class="oem-card-title">Expert Technicians</h4>
                        </div>

                        <p class="oem-desc">
                            Our skilled technicians ensure proper installation and maintenance.
                        </p>

                        <ul class="oem-list">
                            <li>Certified professionals</li>
                            <li>24/7 support</li>
                            <li>Industry trained staff</li>
                        </ul>
                    </div>
                </div>

                <!-- CARD 3 -->
                <div class="col-lg-4 col-md-6">
                    <div class="oem-card">
                        <div class="oem-img-box">
                            <img src="{{ asset('frontend/images/chief-img.jpg') }}" alt="oem-img"
                                class="oem-img img-fluid">
                            <h4 class="oem-card-title">Affordable Solutions</h4>
                        </div>

                        <p class="oem-desc">
                            We offer cost-effective medical equipment without compromising on quality.
                        </p>

                        <ul class="oem-list">
                            <li>Budget friendly pricing</li>
                            <li>Flexible rental options</li>
                            <li>Long-term partnerships</li>
                        </ul>
                    </div>
                </div>
                <div class="text-center mt-5">
                    <button class=" btn-lgg">
                        Talk to Expert
                    </button>
                </div>
            </div>
        </div>
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
@endpush
