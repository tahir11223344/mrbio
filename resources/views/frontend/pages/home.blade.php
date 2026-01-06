@extends('frontend.layouts.frontend')

{{-- @section('title', 'Home') --}}
@section('meta_title', $data->meta_title ?? 'Mr. Biomed Tech Services')
@section('meta_keywords', $data->meta_keywords ?? '')
@section('meta_description', $data->meta_description ?? '')

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

        /* WRAPPER */

        /* SERVICE BUTTON */
        .services-wrapper {
            position: fixed;
            top: 340px;
            right: 0;
            z-index: 9999;
            display: flex;
            align-items: center;
        }

        /* TOGGLE GROUP */
        .services-toggle {
            position: relative;
            width: 48px;
            height: 180px;
        }

        /* SERVICES BUTTON */
        .services-btn {
            width: 48px;
            height: 120px;
            background: #FFFFFF;
            border: 1px solid #FE0000;
            border-top-right-radius: 10px;
            border-bottom-right-radius: 10px;
            cursor: pointer;

            /* 🔥 ROTATE */
            transform: rotate(180deg);
            writing-mode: vertical-rl;
            text-align: center;
            font-weight: 600;
            font-family: Inter;
            font-size: 20px;
            line-height: 100%;
            color: #0071A8;

        }

        /* ARROW ICON (BOTTOM RIGHT) */
        .arrow-icon {
            position: absolute;
            bottom: 0;
            right: 0;
            width: 48px;
            height: 48px;
            background: #FFFFFF;
            display: flex;
            align-items: center;
            justify-content: center;
            border-bottom-right-radius: 10px;
            border-bottom-left-radius: 10px;
            font-size: 18px;
            cursor: pointer;
            transform: rotate(89deg);
            border: 1px solid #FE0000;
        }

        .arrow-icon img {
            width: 35px;
            height: 37px;
            transform: rotate(271deg);
            display: flex;
            align-items: center;
            justify-content: center;

        }

        /* SLIDE PANEL */
        .services-panel {
            position: absolute;
            right: 48px;
            width: 191px;
            /* height: 207px; */
            background: #fff;
            border-top-left-radius: 10px;
            border-bottom-left-radius: 10px;
            padding: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
            display: none;
            top: 3px;
        }

        .services-panel h4 {
            font-size: 12px;
            font-weight: 500;
            font-family: Inter;
            line-height: 100%;
            color: #000000;
            margin-bottom: 10px;
        }


        .services-panel p {
            margin-bottom: 10px;
            font-size: 11px;
            font-weight: 400;
            font-family: Inter;
            line-height: 100%;
            color: #000000;
        }

        .services-panel p a {
            color: #000000 !important;

        }

        .explore-btn {
            margin-top: 10px;
            width: 109px;
            height: 24px;
            /* padding: 8px; */
            background: #FFFFFF;
            border-radius: 10px;
            border: 2px solid #0071A8;
            cursor: pointer;
            font-size: 12px;
            font-weight: 400;
            font-family: Inter;
            line-height: 100%;
            color: #000000;
            transition: all 0.4s ease-in-out;
            clip-path: polygon(0% 0%,
                    100% 0%,
                    100% 100%,
                    0% 100%);
        }

        .explore-btn:hover {
            background: #0071A8;
            border: none;
            color: #FFFFFF;
            /* transform: scale(1.05) */
            clip-path: polygon(12% 0%,
                    100% 0%,
                    88% 100%,
                    0% 100%);
            border-radius: 0px;

        }

        .services-panel {
            display: none;
        }

        .services-panel.active {
            display: block;
        }
    </style>
@endpush

@php
    $heading = split_heading($data?->hero_heading ?? '');
    $c = split_heading($data?->content_heading ?? '');
    $x_ray = split_heading($repairServiceData?->x_ray_heading ?? '');
    $c_arm = split_heading($repairServiceData?->c_arm_heading ?? '');
@endphp

@section('frontend-content')


    <section class="hero-section py-5">
        <div class="container">
            <div class="row align-items-center">

                <!-- LEFT COLUMN -->
                <div class="col-lg-6 text-white">

                    <!-- Heading -->
                    <h1 class="hero-heading fade-left">{!! highlightBracketText($data?->hero_heading ?? '', ['#000000']) !!}</h1>

                    <!-- Paragraph -->
                    <p class="hero-para mt-3 fade-right">
                        {{ $data->hero_sd ?? '' }}
                    </p>

                    <!-- Images + Customer Count -->
                    <div class="d-flex align-items-center mt- fade-left">
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
                        <div class="ms-5 fade-right">
                            <h6 class="customer-count">100k+</h6>
                            <p class="customer-text">Satisfied Customers</p>
                        </div>
                    </div>


                    <!-- Buttons -->
                    <div class="mt-5 d-flex align-items-center gap-4">

                        <!-- Service Request -->
                        <div class="d-flex align-items-center gap-2 fade-left">
                            <i class="bi bi-key" id="service-icon"></i>
                            <button class="hero-btn" data-open-service-modal>
                                Service Request
                            </button>

                        </div>

                        <!-- Login -->
                        <div class="d-flex align-items-center gap-2 fade-right">
                            <i class="bi bi-person-fill" id="login-icon"></i>
                            <button class="hero-btn">Medrad Login</button>
                        </div>

                    </div>


                </div>

                <!-- RIGHT COLUMN -->
                @if (!empty($data->hero_slider_images) && count($data->hero_slider_images) > 0)
                    <div class="col-lg-6  text-center fade-right">
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
                                        <img src="{{ asset('storage/landing-page/hero-slider/' . $img) }}"
                                            class="slider-img">
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
                @endif

            </div>
        </div>
    </section>

    <section class="info-section py-5">
        <div class="container">
            <div class="row align-items-stretch">
                <!-- LEFT COLUMN -->
                <div class="col-lg-6 col-md-6 animate-card">
                    <h2 class="info-heading fade-left">{!! highlightBracketText($data?->content_heading ?? '') !!} </h2>

                    <div class="info-para fade-right">
                        {!! $data->content_description !!}
                    </div>

                    <a href="{{ route('about-us') }}">
                        <button class="read-btn mt-3">Read More</button>
                    </a>
                </div>

                <!-- RIGHT COLUMN (Image) -->
                <div class="col-lg-6 col-md-6 mt-4 mt-lg-0 text-center fade-right">

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
    <section class="features-section py-5">
        <div class="container">
            <div class="row text-white">

                <!-- Feature 1 -->
                <div
                    class="col-lg-3 col-md-6 col-12 mb-4 animate-card d-flex align-items-start justify-content-lg-start justify-content-center text-lg-start text-center">
                    <i class="bi bi-truck feature-icon"></i>
                    <div class="ms-3">
                        <h5 class="fw-bol mt-2">Free Shipping</h5>
                        <p class="small mb-0">Order over $600</p>
                    </div>
                </div>

                <!-- Feature 2 -->
                <div
                    class="col-lg-3 col-md-6 col-12 animate-card mb-4 d-flex align-items-start justify-content-lg-start justify-content-center text-lg-start text-center">
                    <i class="bi bi-credit-card feature-icon"></i>
                    <div class="ms-3">
                        <h5 class="fw-bol mt-2">Quick Payment</h5>
                        <p class="small ">100% secure</p>
                    </div>
                </div>

                <!-- Feature 3 -->
                <div
                    class="col-lg-3 col-md-6 animate-card col-12 mb-4 d-flex align-items-start justify-content-lg-start justify-content-center text-lg-start text-center">
                    <i class="bi bi-cash-coin feature-icon"></i>
                    <div class="ms-3">
                        <h5 class="fw-bol mt-1">Big Cashback</h5>
                        <p class="small ">Over 50% cash back</p>
                    </div>
                </div>

                <!-- Feature 4 -->
                <div
                    class="col-lg-3 col-md-6 animate-card mb-4 d-flex align-items-start justify-content-lg-start justify-content-center text-lg-start text-center">
                    <i class="bi bi-headset feature-icon"></i>
                    <div class="ms-3 mt-2">
                        <h5 class="fw-bold">24/7 Support</h5>
                        <p class="small">Ready for you</p>
                    </div>
                </div>


            </div>
        </div>
    </section>

    <x-best-selling-products-section />


    {{-- Offer Slider Component --}}
    <x-offers-section />

    <!-- Example 1: Home Page -->
    <x-repair-service-section :types="['x-ray', 'c-arm']" />
    <!-- Output: X-Ray → C-Arm -->

    <section class="medical-section py-5">
        <div class="container">

            <!-- Main Heading -->
            <h2 class="text-center mb-5 main-heading fade-left">
                Our Life-Saving Medical Equipment for Sales,<span>Services</span> & <span>Rentals</span> !
            </h2>

            <!-- 2 Columns -->
            <div class="row ">

                <div class="col-8 mx-auto">

                    <div class="row g-4">
                        <!-- LEFT COLUMN -->
                        <div class="col-lg-6 col-md-12 mb-4 mx-auto fade-left">

                            <div class="equipment-block mb-3">
                                <h4 class="equipment-title">Anesthesia Machines</h4>
                                <ul class="equipment-list">
                                    <li>Anesthesia Machines</li>
                                    <li>Vaporizers</li>
                                    <li>Anesthesia Monitors</li>
                                </ul>
                            </div>

                            <div class="equipment-block mb-3">
                                <h4 class="equipment-title">Endoscopy</h4>
                                <ul class="equipment-list">
                                    <li>Cameras</li>
                                    <li>Insufflators</li>
                                    <li>Scopes – (Including Gastroscopes, Colonoscopes, Bronchoscopes, Laparoscopes,
                                        Cystoscopes, Duodenoscopes)</li>
                                </ul>
                            </div>

                            <div class="equipment-block mb-3">
                                <h4 class="equipment-title">General Medical Equipment</h4>
                                <ul class="equipment-list">
                                    <li>Patient Monitors</li>
                                    <li>Vital Sign Monitors</li>
                                    <li>Exam Tables</li>
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
                        <div class="col-lg-6 col-md-12 mb-4 fade-right">

                            <div class="equipment-block mb-3">
                                <h4 class="equipment-title">Imaging Diagnostic Equipment</h4>
                                <ul class="equipment-list">
                                    <li>Imaging Diagnostic Equipment</li>
                                </ul>
                            </div>

                            <div class="equipment-block mb-3">
                                <h4 class="equipment-title">Surgical Equipment</h4>
                                <ul class="equipment-list">
                                    <li>Operation Lights/Surgical Lights</li>
                                    <li>Surgical Tables</li>
                                    <li>Electrosurgical Units (ESU)</li>
                                    <li>Hypothermia Units</li>
                                    <li>Stretchers/Gurneys/Hospital Beds</li>
                                </ul>
                            </div>

                            <div class="equipment-block mb-3">
                                <h4 class="equipment-title">Sterilizers</h4>
                                <ul class="equipment-list">
                                    <li>Tabletop Autoclaves (Including Tuttnauer Autoclave, Midmark Autoclave and M11
                                        Autoclave)</li>
                                    <li>Free-standing autoclaves (Including Tuttnauer, Midmark, Steris, Getinge and Belimed
                                        Autoclave)</li>
                                </ul>
                            </div>

                            <div class="equipment-block mb-3">
                                <h4 class="equipment-title">Ultrasound</h4>
                                <ul class="equipment-list">
                                    <li>Ultrasound Machines</li>
                                    <li>Portable X-ray Systems</li>
                                    <li>C-arms</li>
                                    <li>Bone Density Machines</li>
                                    <li>Radiology Rooms (Rad Room)</li>
                                </ul>
                            </div>

                        </div>
                    </div>

                </div>

                <div class="col-8 mx-auto">
                    <p class="bottom-text fade-left">
                        We cover a full spectrum of medical equipment over various rental and purchasing plans. This
                        includes diagnostic equipment, advanced therapeutic devices, sterilization machines, IV pumps, beds,
                        stretchers, and your routine operating room tools. Our products are available for small clinics and
                        large independent medical practices with the added bonus of continuous support over the course of
                        the ownership period.
                    </p>

                    <div class="text-start mt-4">
                        <a href="{{ route('contact-us') }}">
                            <button class=" get-btn fade-right">
                                Get in Touch with Us Today!
                            </button>
                        </a>


                    </div>
                </div>

            </div>

        </div>
    </section>

    {{-- ================= OEM Section  ================= --}}
    <x-oem-section />




    {{-- ================= Our Mission Section ================= --}}
    <x-our-mission />

    {{-- ================= Locations We Serve Section ================= --}}
    <x-location-we-served />

    {{-- ================= Why Choose Biomed Section ================= --}}
    <x-why-choice-biomed />


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

    <x-faq-section :faqs="$faqs" heading="Frequently Asked Questions" subheading="About Our Profile?"
        subtext="We provide sales, rental, and repair services for medical equipment with ISO certified"
        image="frontend/images/hero-main-img.png" :visible="4" />



    {{-- ================= pruduct sectiion ============= --}}
    <x-our-latest-products />


    {{-- ============= reveiw sectiion ================== --}}
    <x-testimonial-slider />


    {{-- ============ Recent News Section ============ --}}
    <!-- Default: 4 blogs -->
    <x-recent-blogs-section />


    <!-- SERVICES TOGGLE WRAPPER -->
    <div class="services-wrapper">

        <!-- SLIDE PANEL -->
        <div class="services-panel">
            <h4>Choose Your Rental Services</h4>

            @foreach (getServicesList() as $service)
                <p class="mb-1">
                    <a href="{{ route('biomed-services') }}" class="text-decoration-none">
                        {{ $service }}
                    </a>
                </p>
            @endforeach

            <a href="{{ route('biomed-services') }}">
                <button type="button" class="explore-btn">
                    Explore More
                </button>
            </a>

        </div>

        <!-- BUTTON + ICON GROUP -->
        <div class="services-toggle">

            <button class="services-btn">Services</button>

            <div class="arrow-icon">
                <img src="{{ asset('frontend/images/icon-img.png') }}" alt="">

            </div>

        </div>
    </div>

@endsection

@push('frontend-scripts')
    <script>
        document.addEventListener("DOMContentLoaded", function() {

            const track = document.querySelector(".slider-track");
            const slides = document.querySelectorAll(".slide");

            if (!track || slides.length === 0) return;

            let index = 1;
            let total = slides.length;

            // Initial translate
            track.style.transform = `translateX(-${index * 100}%)`;

            function autoSlide() {
                index++;
                track.style.transition = "transform 0.8s ease-in-out";
                track.style.transform = `translateX(-${index * 100}%)`;

                // If clone slide reached → instantly jump to first real slide
                if (index >= total - 1) {
                    setTimeout(() => {
                        track.style.transition = "none";
                        index = 1;
                        track.style.transform = `translateX(-100%)`;
                    }, 800);
                }
            }

            setInterval(autoSlide, 3500);

        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', () => {

            const servicesBtn = document.querySelector('.services-btn');
            const panel = document.querySelector('.services-panel');

            // Button click → toggle panel
            servicesBtn.addEventListener('click', (e) => {
                e.stopPropagation(); // 👈 bahir wale click se roko
                panel.classList.toggle('active');
            });

            // Panel ke andar click → panel close na ho
            panel.addEventListener('click', (e) => {
                e.stopPropagation();
            });

            // Bahir kahin bhi click → panel hide
            document.addEventListener('click', () => {
                panel.classList.remove('active');
            });

        });
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
