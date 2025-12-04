@extends('frontend.layouts.frontend')

@section('title', 'Contact Us')

@push('frontend-styles')
    <style>
        .team-section {
            background: #ffffff;
        }

        /* Box Styling */
        .team-box {
            padding: 30px 20px;
        }

        /* Middle Column Borders */
        .middle-box {
            border-left: 2px solid #000000;
            border-right: 2px solid #000000;
            /* border-top: 2px solid #0071A8; */
            /* border-bottom: 2px solid #0071A8; */
        }

        /* Titles */
        .team-title {
            font-size: 28px;
            font-weight: 700;
            color: #0168A4;
            font-family: Inter;
            line-height: 100%;
            margin-bottom: 5px;
        }

        /* Sub Text */
        .team-sub {
            font-size: 28px;
            font-weight: 300;
            font-family: Inter;
            line-height: 100%;
            color: #000000;
        }

        /* Responsive Fix */
        @media(max-width: 767px) {
            .middle-box {
                border: none;
                border-top: 2px solid #0071A8;
                border-bottom: 2px solid #0071A8;
                margin: 20px 0;
                padding: 20px 0;
            }
        }


        .premium-section {
            background: #ffffff;
        }

        .premium-title {
            font-size: 28px;
            font-weight: 300;
            font-family: Inter;
            color: #0A70A2;
            line-height: 100%;
            text-align: left;
            /* Left aligned */
        }

        /* Parent column ko center control ke liye */
        .logo-box {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        /* Logo 1 */
        .premium-logo {
            width: 230.588px;
            height: 109.309px;
            max-width: 100%;
            /* screen small ho to scale down */
            object-fit: contain;
            transition: all 0.4s ease;
        }

        /* Logo 2 */
        .premium-logo1 {
            width: 156.155px;
            height: 156.155px;
            max-width: 100%;
            object-fit: contain;
            transition: all 0.4s ease;
        }

        /* Logo 3 */
        .premium-logo2 {
            width: 520.519px;
            height: 55.522px;
            max-width: 100%;
            object-fit: contain;
            transition: all 0.4s ease;
        }

        /* Mobile responsive fix */
        @media(max-width: 576px) {

            .premium-logo,
            .premium-logo1,
            .premium-logo2 {
                /* width: 100% !important; */
                /* full width but maintain aspect fit */
                height: auto !important;
                /* proportionally adjust */
            }
        }


        /* Hover effect (optional) */
        .premium-logo:hover,
        .premium-logo1:hover,
        .premium-logo2:hover {
            transform: scale(1.08);
        }


        /* Responsive */
        @media(max-width: 768px) {
            .premium-title {
                text-align: center;
                /* Mobile center */
            }
        }

        /* =============== map ================== */
        .map-section {
            width: 100%;
            padding: 0;
            margin: 0;
        }

        .map-container {
            width: 100%;
            height: 453.2987976074219px;
            /* aap isko change kar sakte ho */
        }

        .map-container iframe {
            width: 100%;
            height: 100%;
            border: none;
        }

        @media (max-width: 767px) {



            .map-section {
                margin-top: 166% !important;
            }
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
            transform: scale(1.1);

        }
    </style>
@endpush



@section('frontend-content')
    <section class="hero-detail-section">
        <div class="container py-5 text-center text-white">

            <h1 class="hero-title mb-3"><span>Title About </span>Contact Page </h1>

            <p class="hero-description mx-auto mb-4">
                Discover the comprehensive range of specialized biomedical services we offer, designed to support your
                operational needs and technological advancement.
            </p>

            <div class="container py-5 text-center text-white">
                <div class="simple-breadcrumb-container text-start mx-auto">
                    <div class="simple-breadcrumb">

                        <a href="/" class="breadcrumb-link">Home</a>

                        <span class="breadcrumb-separator">|</span>

                        <span class="breadcrumb-active">Contact Us</span>
                    </div>
                </div>

            </div>

        </div>
    </section>
    <section class="team-section py-5">
        <div class="container">
            <div class="row text-center">

                <!-- Column 1 -->
                <div class="col-md-4 team-box">
                    <h2 class="team-title">Team Member</h2>
                    <p class="team-sub">Expert</p>
                </div>

                <!-- Column 2 (with borders left & right + top-bottom) -->
                <div class="col-md-4 team-box middle-box">
                    <h2 class="team-title">Result-Driven</h2>
                    <p class="team-sub">Approach</p>
                </div>

                <!-- Column 3 -->
                <div class="col-md-4 team-box">
                    <h2 class="team-title">Streamlined</h2>
                    <p class="team-sub">Execution</p>
                </div>

            </div>
        </div>
    </section>


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

    <section class="contact-section py-5">
        <div class="container">
            <div class="row g-2">

                <!-- Left Column -->
                <div class="col-lg-6">
                    <h2 class="contact-heading mb-3">Contact Us</h2>
                    <p class="contact-desc mb-4">
                        Have questions or need support? Our team is ready to assist you with expert imaging services,
                        maintenance, and repairs across Texas.
                    </p>

                    <div class="contact-info mb-3">
                        <i class="bi bi-telephone-fill contact-icon"></i>
                        <span class="contact-text">+1 234 567 8900</span>
                    </div>

                    <div class="contact-info mb-3">
                        <i class="bi bi-envelope-fill contact-icon"></i>
                        <span class="contact-text">support@example.com</span>
                    </div>

                    <div class="contact-info mb-4">
                        <i class="bi bi-geo-alt-fill contact-icon"></i>
                        <span class="contact-text">Dallas, Texas, USA</span>
                    </div>

                    <h5 class="tech-heading mb-3">Technicians dispatched from throughout Texas</h5>

                    <div class="contact-info">
                        <i class="bi bi-people-fill contact-icon"></i>
                        <span class="contact-textt">Technicians dispatched from throughout Texas</span>
                    </div>
                </div>

                <!-- Right Column: Form -->
                <div class="col-lg-6">
                    <div class="form-wrapper p-4">
                        <h3 class="form-heading mb-3">Do You Want Quick Chat?</h3>
                        <p class="form-desc mb-4">
                            Fill out the form below and our team will get back to you shortly.
                            Fill out the form below and our team will get back to you shortly.

                        </p>

                        <form>
                            <div class="mb-3">
                                <input type="text" class="form-control formm-input" placeholder="Enter Name">
                            </div>

                            <div class="mb-3">
                                <input type="email" class="form-control formm-input" placeholder="Enter Email">
                            </div>

                            <!-- City & State in same row -->
                            <div class="d-flex gap-3">
                                <div class=" mb-3">
                                    <select class="form-select formm-select">
                                        <option selected>Select City</option>
                                        <option>Dallas</option>
                                        <option>Houston</option>
                                        <option>Austin</option>
                                    </select>
                                </div>

                                <div class=" mb-3">
                                    <select class="form-select formm-select">
                                        <option selected>Select State</option>
                                        <option>Texas</option>
                                        <option>New York</option>
                                        <option>California</option>
                                    </select>
                                </div>
                            </div>

                            <div class="mb-3">
                                <select class="form-select formmm-select">
                                    <option selected>Select Services</option>
                                    <option>X-Ray Machine Repair</option>
                                    <option>Imaging Maintenance</option>
                                    <option>Biomedical Services</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <textarea class="form-control formm-text" rows="4" placeholder="Enter Message"></textarea>
                            </div>

                            <button type="submit" class="btn submit-btn ">Request Submit</button>
                        </form>

                    </div>
                </div>

            </div>
        </div>
    </section>
    <section class="map-section">
        <div class="map-container">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d22272.355104565694!2d-96.800451!3d32.776664!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x864e991a57fbcb6f%3A0xbe0b2982a9e8cad8!2sDallas%2C%20TX%2C%20USA!5e0!3m2!1sen!2sus!4v1700000000000"
                allowfullscreen="" loading="lazy">
            </iframe>
        </div>
    </section>
    {{-- ======================== offer slider ======================== --}}
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
                <!-- PAGINATION DOTS -->
                <div class="offer-pagination"></div>

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
