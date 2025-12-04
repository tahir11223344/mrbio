@extends('frontend.layouts.frontend')

@section('title', 'Location Detail Page')

@push('frontend-styles')
    <style>
        .query-section {
            /* background: #f7f9fb; */
        }

        .query-box {
            background: #006A9E1A;
            max-width: 1152px;
            width: 100%;
            border-radius: 12px;
        }

        .query-heading {
            font-weight: 700;
            font-family: Inter;
            font-size: 36px;
            line-height: 100%;
            color: #026B9F;
        }

        .query-box .form-label {
            font-weight: 600;
            font-family: Inter;
            font-size: 24px;
            line-height: 140%;
            color: #000000B2;
        }

        /* Input width 1016px (centered) */
        .custom-input {
            max-width: 1016px;
            width: 100%;
            height: 71px;
            border-radius: 15px;
            font-weight: 400;
            font-family: Inter;
            font-size: 24px;
            line-height: 140%;
            color: #8B8B8B;
        }

        .custom-select {
            max-width: 388px;
            width: 100%;
            height: 71px;
            border-radius: 15px;
            font-weight: 400;
            font-family: Inter;
            font-size: 24px;
            line-height: 140%;
            color: #8B8B8B;
        }

        .custom-text {
            max-width: 1016px;
            width: 100%;
            height: 256px;
            border-radius: 15px;
            font-weight: 400;
            font-family: Inter;
            font-size: 24px;
            line-height: 140%;
            color: #8B8B8B;
        }

        /* Make textarea same width */
        textarea.custom-input {
            resize: none;
        }

        .form-control:focus,
        .form-select:focus,
        textarea.form-control:focus {
            box-shadow: none !important;
            outline: none !important;
            border: 2px solid #026B9F !important;
            color: #8B8B8B;

        }

        .query-btn {
            width: 145px;
            height: 45px;
            border-radius: 10px;
            background: #0071A8;
            color: #ffffff;
            font-weight: 600;
            font-family: Inter;
            font-size: 20px;
            line-height: 100%;
            border: none;
            transition: all 0.4s ease-in-out;
        }

        .query-btn:hover {
            background: #015883;
            transform: scale(1.03);
        }

        .subb-heading {
            color: #046DA0;
            font-weight: 600;
            font-family: Inter;
            font-size: 24px;
            line-height: 40px;
            margin-top: 10px;
        }

        .subb-headingg {
            color: #000000;
            font-weight: 600;
            font-family: Inter;
            font-size: 18px;
            line-height: 40px;
            max-width: 541px;
        }

        .subb-para {
            color: #00000080;
            font-weight: 700;
            font-family: Arial;
            font-size: 16px;
            line-height: 160%;
        }
    </style>
@endpush

@section('frontend-content')
    <section class="hero-detail-section">
        <div class="container py-5 text-center text-white">

            <h1 class="hero-title mb-3 fade-right"><span>Sub Location/</span> Area Detail Page </h1>
            <p class="hero-description mx-auto mb-4 fade-left">
                Discover the comprehensive range of specialized biomedical services we offer, designed to support your
                operational needs and technological advancement.
            </p>

            <div class="container py-5 text-center text-white">
                <div class="simple-breadcrumb-container text-start mx-auto">
                    <div class="simple-breadcrumb">

                        <a href="/" class="breadcrumb-link">Home</a>

                        <span class="breadcrumb-separator">|</span>

                        <span class="breadcrumb-active">Location Detail page</span>
                    </div>
                </div>

            </div>

        </div>
    </section>
    <section class="biomed-section">
        <div class="container">
            <div class="row justify-content-cente mt-2">

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
                    <h2 class="subb-heading">Medical & Lab Equipment Repair and Preventative Maintenance in Virginia and
                        the Mid Atlantic Region </h2>
                    <h2 class="subb-headingg">Medical & Lab Equipment Repair and Preventative Maintenance in Virginia and
                        the Mid Atlantic Region </h2>

                    <p class="subb-para">
                        Libero diam auctor tristique hendrerit in eu vel id. Nec leo amet suscipit nulla. Nullam vitae sit
                        tempus diam.Libero diam auctor tristique hendrerit in eu vel id. Nec leo amet suscipit nulla. Nullam
                        vitae sit tempus diam.Libero diam auctor tristique hendrerit in eu vel id. Nec leo amet suscipit
                        nulla. Nullam vitae sit tempus diam.Libero diam auctor tristique hendrerit in eu vel id. Nec leo
                        amet suscipit nulla. Nullam vitae sit tempus diam.Libero diam auctor tristique hendrerit in eu vel
                        id. Nec leo amet suscipit nulla. Nullam vitae sit tempus diam.Libero diam auctor tristique hendrerit
                        in eu vel id. Nec leo amet suscipit nulla. Nullam vitae sit tempus diam.Libero diam auctor tristique
                        hendrerit in eu vel id. Nec leo amet suscipit nulla. Nullam vitae sit tempus diam.Libero diam auctor
                        tristique hendrerit in eu vel id. Nec leo amet suscipit nulla. Nullam vitae sit tempus diam.Libero
                        diam auctor tristique hendrerit in eu vel id. Nec leo amet suscipit nulla. Nullam vitae sit tempus
                        diam.
                    </p>

                    <button class="quote-btn">Request A Quote</button>
                </div>

            </div>
        </div>
    </section>

    <!-- ===== SECTION START ===== -->
    <section class="query-section py-5 d-flex justify-content-center">
        <div class="query-box p-4 p-md-5">

            <h2 class=" mb-4 query-heading">Submit Your Query Here</h2>

            <form>

                <!-- Name -->
                <div class="mb-3">
                    <label class="form-label">Name</label>
                    <input type="text" class="form-control custom-input" placeholder="Enter your name">
                </div>

                <!-- Email -->
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" class="form-control custom-input" placeholder="Enter your email">
                </div>

                <!-- Phone -->
                <div class="mb-3">
                    <label class="form-label">Phone Number</label>
                    <input type="text" class="form-control custom-input" placeholder="Enter phone number">
                </div>

                <!-- Company / Hospital -->
                <div class="mb-3">
                    <label class="form-label">Company / Hospital Name</label>
                    <input type="text" class="form-control custom-input" placeholder="Enter company / hospital name">
                </div>
                <div class="mb-3">
                    <label class="form-label">Select Your Service Needs</label>
                    <select class="form-select custom-select">
                        <option value=""> Select Service</option>
                        <option value="medical">Medical Service</option>
                        <option value="cleaning">Cleaning Service</option>
                        <option value="security">Security Service</option>
                        <option value="it-support">IT Support</option>
                    </select>
                </div>

                <!-- Service Needs -->
                <div class="mb-3">
                    <label class="form-label fw-bold">Equipment Category</label>

                    <div class="d-flex gap-4 flex-wrap w-50">

                        <div class="form-check">
                            <input class="form-check-input" type="checkbox">
                            <label class="form-check-label">Consultation</label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="checkbox">
                            <label class="form-check-label">Medical Assistance</label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="checkbox">
                            <label class="form-check-label">Emergency Support</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox">
                            <label class="form-check-label">Consultation</label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="checkbox">
                            <label class="form-check-label">Medical Assistance</label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="checkbox">
                            <label class="form-check-label">Emergency Support</label>
                        </div>

                    </div>
                </div>


                <!-- Message -->
                <div class="mb-3">
                    <label class="form-label">Message</label>
                    <textarea rows="4" class="form-control custom-text" placeholder="Write your message..."></textarea>
                </div>

                <!-- Preferred Contact -->
                <div class="mb-3">
                    <label class="form-label fw-bold">Preferred Contact Method</label>

                    <div class="d-flex justify-content-between flex-wrap" style="width:100%; max-width: 1016px;">
                        <div class="d-flex gap-4 flex-wrap">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="contact">
                                <label class="form-check-label">Phone</label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="contact">
                                <label class="form-check-label">Email</label>
                            </div>
                        </div>

                        <button type="submit" class="query-btn">Submit</button>
                    </div>
                </div>

                <!-- Submit -->


            </form>

        </div>
    </section>
    <!-- ===== SECTION END ===== -->
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
