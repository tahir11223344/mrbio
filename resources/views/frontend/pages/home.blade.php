@extends('frontend.layouts.frontend')

@section('title', 'Home')

@push('frontend-styles')
@endpush

@section('frontend-content')


    <section class="hero-section py-5">
        <div class="container">
            <div class="row align-items-center">

                <!-- LEFT COLUMN -->
                <div class="col-lg-6 text-white">

                    <!-- Heading -->
                    <h1 class="hero-heading fade-left">
                        Your Trusted Medical <span> Equipment Store</span>
                    </h1>

                    <!-- Paragraph -->
                    <p class="hero-para mt-3 fade-right">
                        We provide top-notch medical services, trusted by thousands of happy and satisfied clients
                        across the country.
                    </p>

                    <!-- Images + Customer Count -->
                    <div class="d-flex align-items-center mt-4">
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
                        <div class="ms-5">
                            <h6 class="customer-count">100k+</h6>
                            <p class="customer-text">Satisfied Customers</p>
                        </div>
                    </div>


                    <!-- Buttons -->
                    <div class="mt-5 d-flex align-items-center gap-4">

                        <!-- Service Request -->
                        <div class="d-flex align-items-center gap-2">
                            <i class="bi bi-key" id="service-icon"></i>
                            <button class="hero-btn">Service Request</button>
                        </div>

                        <!-- Login -->
                        <div class="d-flex align-items-center gap-2">
                            <i class="bi bi-person-fill" id="login-icon"></i>
                            <button class="hero-btn">Medrad Login</button>
                        </div>

                    </div>


                </div>

                <!-- RIGHT COLUMN -->
                <div class="col-lg-6 mt-5 mt-lg-0 text-center">
                    <div class="slider-container">
                        <div class="slider-track">

                            <div class="slide"><img src="{{ asset('frontend/images/hero-main-img.png') }}"
                                    alt="hero-main-img" class="slider-img">
                            </div>
                            <div class="slide"><img src="{{ asset('frontend/images/hero-main-img.png') }}"
                                    alt="hero-main-img" class="slider-img">
                            </div>

                            <div class="slide"><img src="{{ asset('frontend/images/hero-main-img.png') }}"
                                    alt="hero-main-img" class="slider-img">
                            </div>
                            <div class="slide"><img src="{{ asset('frontend/images/hero-main-img.png') }}"
                                    alt="hero-main-img" class="slider-img">
                            </div>

                            <!-- DUPLICATE FIRST SLIDE (for perfect loop) -->
                            <div class="slide"><img src="{{ asset('frontend/images/hero-main-img.png') }}"
                                    alt="hero-main-img" class="slider-img">
                            </div>
                        </div>
                    </div>


                </div>

            </div>
        </div>
    </section>

    <section class="info-section py-5">
        <div class="container">
            <div class="row align-items-stretch">

                <!-- LEFT COLUMN -->
                <div class="col-lg-6 col-md-6 ">
                    <h2 class="info-heading">MEDICAL EQUIPMENT AND FURNITURE, <span>SINCE 2002</span> </h2>

                    <p class="info-para">
                        We ensure top-quality medical assistance and modern healthcare
                        solutions designed especially to meet your needs.
                    </p>

                    <p class="info-para">
                        Our team works day and night to provide the best medical support,
                        ensuring your complete satisfaction and care.
                    </p>
                    <p class="info-para">
                        We ensure top-quality medical assistance and modern healthcare
                        solutions designed especially to meet your needs.
                    </p>

                    <p class="info-para">
                        Our team works day and night to provide the best medical support,
                        ensuring your complete satisfaction and care.
                    </p>
                    <p class="info-para">
                        We ensure top-quality medical assistance and modern healthcare
                        solutions designed especially to meet your needs.
                    </p>


                    <button class="read-btn mt-3">Read More</button>
                </div>

                <!-- RIGHT COLUMN (Image) -->
                <div class="col-lg-6 col-md-6 mt-4 mt-lg-0 text-center">

                    <div class="image-slider-wrapper">
                        <div class="image-slide-track">

                            <div class="image-slide-item">
                                <img src="{{ asset('frontend/images/medical-img.jpg') }}" alt="Medical Image 1"
                                    class="info-img img-fluid">
                            </div>

                            <div class="image-slide-item">
                                <img src="{{ asset('frontend/images/medical-img.jpg') }}" alt="Medical Image 1"
                                    class="info-img img-fluid">
                            </div>

                            <div class="image-slide-item">
                                <img src="{{ asset('frontend/images/medical-img.jpg') }}" alt="Medical Image 1"
                                    class="info-img img-fluid">
                            </div>

                            <div class="image-slide-item">
                                <img src="{{ asset('frontend/images/medical-img.jpg') }}" alt="Medical Image 1"
                                    class="info-img img-fluid">
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <section class="features-section
                        py-5">
        <div class="container">
            <div class="row text-white">

                <!-- Feature 1 -->
                <div
                    class="col-lg-3 col-md-6 col-12 mb-4 d-flex align-items-start justify-content-lg-start justify-content-center text-lg-start text-center">
                    <i class="bi bi-truck feature-icon"></i>
                    <div class="ms-3">
                        <h5 class="fw-bol mt-2">Free Shipping</h5>
                        <p class="small mb-0">Order over $600</p>
                    </div>
                </div>

                <!-- Feature 2 -->
                <div
                    class="col-lg-3 col-md-6 col-12 mb-4 d-flex align-items-start justify-content-lg-start justify-content-center text-lg-start text-center">
                    <i class="bi bi-credit-card feature-icon"></i>
                    <div class="ms-3">
                        <h5 class="fw-bol mt-2">Quick Payment</h5>
                        <p class="small ">100% secure</p>
                    </div>
                </div>

                <!-- Feature 3 -->
                <div
                    class="col-lg-3 col-md-6 col-12 mb-4 d-flex align-items-start justify-content-lg-start justify-content-center text-lg-start text-center">
                    <i class="bi bi-cash-coin feature-icon"></i>
                    <div class="ms-3">
                        <h5 class="fw-bol mt-1">Big Cashback</h5>
                        <p class="small ">Over 50% cash back</p>
                    </div>
                </div>

                <!-- Feature 4 -->
                <div
                    class="col-lg-3 col-md-6 mb-4 d-flex align-items-start justify-content-lg-start justify-content-center text-lg-start text-center">
                    <i class="bi bi-headset feature-icon"></i>
                    <div class="ms-3 mt-2">
                        <h5 class="fw-bold">24/7 Support</h5>
                        <p class="small">Ready for you</p>
                    </div>
                </div>


            </div>
        </div>
    </section>

    <section class="best-selling-section mt-5 py-3">
        <div class="container">

            <!-- Heading -->
            <h2 class="section-title mb-4">Best <span>Selling</span> Medical Equipment Essentials</h2>

            <!-- Search Input -->
            <div class="search-wrapper mb-4">
                <input type="text" class="search-input" placeholder="Search the store">

                <button class="search-btn">
                    <i class="bi bi-search"></i>
                </button>
            </div>


            <!-- Buttons -->
            <div class="row g-4 justify-content-center">
                <div class="col-auto">
                    <button class="cat-btn">Hospital Bed</button>
                </div>
                <div class="col-auto">
                    <button class="cat-btn">Surgical</button>
                </div>
                <div class="col-auto">
                    <button class="cat-btn">Operation Table</button>
                </div>
                <div class="col-auto">
                    <button class="cat-btn">Carts</button>
                </div>
                <div class="col-auto">
                    <button class="cat-btn">Hospital Bed</button>
                </div>
                <div class="col-auto">
                    <button class="cat-btn">BP Monitor</button>
                </div>
                <div class="col-auto">
                    <button class="cat-btn">Pulse Oximeter</button>
                </div>
                <div class="col-auto">
                    <button class="cat-btn">Stethoscope</button>
                </div>
            </div>

        </div>

        <section class="best-products  mt-5">
            <div class="container">
                <div class="row g-4 justify-content-center">

                    <div class="col-lg-3 col-md-6">
                        <div class="product-card position-relative">

                            <!-- Discount Badge -->
                            <span class="discount-badge">10% OFF</span>

                            <img src="{{ asset('frontend/images/product-img-1.jpg') }}" alt="product image"
                                class="product-img img-fluid">

                            <!-- Stars -->
                            <div class="stars">
                                <i class="bi bi-star-fill gold"></i>
                                <i class="bi bi-star-fill gold"></i>
                                <i class="bi bi-star-fill gold"></i>
                                <i class="bi bi-star-fill gold"></i>
                                <i class="bi bi-star-fill"></i>
                            </div>

                            <h4 class="product-title">Acetaminophen Pills</h4>
                            <p class="product-desc">Short product description goes here.</p>

                            <div class="d-flex justify-content-between align-items-center price-box">
                                <span class="old-price">$18</span>
                                <span class="new-price">$12</span>
                                <button class="buy-btn">Buy Now</button>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="product-card position-relative">
                            <span class="discount-badge">10% OFF</span>

                            <img src="{{ asset('frontend/images/product-img-1.jpg') }}" alt="product image"
                                class="product-img img-fluid">
                            <div class="stars">
                                <i class="bi bi-star-fill gold"></i>
                                <i class="bi bi-star-fill gold"></i>
                                <i class="bi bi-star-fill gold"></i>
                                <i class="bi bi-star-fill gold"></i>
                                <i class="bi bi-star-fill"></i>
                            </div>

                            <h4 class="product-title">Acetaminophen Pills</h4>
                            <p class="product-desc">Short product description goes here.</p>

                            <div class="d-flex justify-content-between align-items-center price-box">
                                <span class="old-price">$18</span>
                                <span class="new-price">$12</span>
                                <button class="buy-btn">Buy Now</button>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="product-card position-relative">
                            <span class="discount-badge">10% OFF</span>
                            <img src="{{ asset('frontend/images/product-img-1.jpg') }}" alt="product image"
                                class="product-img img-fluid">
                            <div class="stars">
                                <i class="bi bi-star-fill gold"></i>
                                <i class="bi bi-star-fill gold"></i>
                                <i class="bi bi-star-fill gold"></i>
                                <i class="bi bi-star-fill gold"></i>
                                <i class="bi bi-star-fill"></i>
                            </div>

                            <h4 class="product-title">Acetaminophen Pills</h4>
                            <p class="product-desc">Short product description goes here.</p>

                            <div class="d-flex justify-content-between align-items-center price-box">
                                <span class="old-price">$18</span>
                                <span class="new-price">$12</span>
                                <button class="buy-btn">Buy Now</button>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="product-card position-relative">
                            <span class="discount-badge">10% OFF</span>

                            <img src="{{ asset('frontend/images/product-img-1.jpg') }}" alt="product image"
                                class="product-img img-fluid">
                            <div class="stars">
                                <i class="bi bi-star-fill gold"></i>
                                <i class="bi bi-star-fill gold"></i>
                                <i class="bi bi-star-fill gold"></i>
                                <i class="bi bi-star-fill gold"></i>
                                <i class="bi bi-star-fill"></i>
                            </div>

                            <h4 class="product-title">Acetaminophen Pills</h4>
                            <p class="product-desc">Short product description goes here.</p>

                            <div class="d-flex justify-content-between align-items-center price-box">
                                <span class="old-price">$18</span>
                                <span class="new-price">$12</span>
                                <button class="buy-btn">Buy Now</button>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="product-card position-relative">

                            <!-- Discount Badge -->
                            <span class="discount-badge">10% OFF</span>

                            <img src="{{ asset('frontend/images/product-img-1.jpg') }}" alt="product image"
                                class="product-img img-fluid">
                            <!-- Stars -->
                            <div class="stars">
                                <i class="bi bi-star-fill gold"></i>
                                <i class="bi bi-star-fill gold"></i>
                                <i class="bi bi-star-fill gold"></i>
                                <i class="bi bi-star-fill gold"></i>
                                <i class="bi bi-star-fill"></i>
                            </div>

                            <h4 class="product-title">Acetaminophen Pills</h4>
                            <p class="product-desc">Short product description goes here.</p>

                            <div class="d-flex justify-content-between align-items-center price-box">
                                <span class="old-price">$18</span>
                                <span class="new-price">$12</span>
                                <button class="buy-btn">Buy Now</button>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="product-card position-relative">
                            <span class="discount-badge">10% OFF</span>

                            <img src="{{ asset('frontend/images/product-img-1.jpg') }}" alt="product image"
                                class="product-img img-fluid">
                            <div class="stars">
                                <i class="bi bi-star-fill gold"></i>
                                <i class="bi bi-star-fill gold"></i>
                                <i class="bi bi-star-fill gold"></i>
                                <i class="bi bi-star-fill gold"></i>
                                <i class="bi bi-star-fill"></i>
                            </div>

                            <h4 class="product-title">Acetaminophen Pills</h4>
                            <p class="product-desc">Short product description goes here.</p>

                            <div class="d-flex justify-content-between align-items-center price-box">
                                <span class="old-price">$18</span>
                                <span class="new-price">$12</span>
                                <button class="buy-btn">Buy Now</button>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="product-card position-relative">
                            <span class="discount-badge">10% OFF</span>

                            <img src="{{ asset('frontend/images/product-img-1.jpg') }}" alt="product image"
                                class="product-img img-fluid">
                            <div class="stars">
                                <i class="bi bi-star-fill gold"></i>
                                <i class="bi bi-star-fill gold"></i>
                                <i class="bi bi-star-fill gold"></i>
                                <i class="bi bi-star-fill gold"></i>
                                <i class="bi bi-star-fill"></i>
                            </div>

                            <h4 class="product-title">Acetaminophen Pills</h4>
                            <p class="product-desc">Short product description goes here.</p>

                            <div class="d-flex justify-content-between align-items-center price-box">
                                <span class="old-price">$18</span>
                                <span class="new-price">$12</span>
                                <button class="buy-btn">Buy Now</button>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="product-card position-relative">
                            <span class="discount-badge">10% OFF</span>

                            <img src="{{ asset('frontend/images/product-img-1.jpg') }}" alt="product image"
                                class="product-img img-fluid">
                            <div class="stars">
                                <i class="bi bi-star-fill gold"></i>
                                <i class="bi bi-star-fill gold"></i>
                                <i class="bi bi-star-fill gold"></i>
                                <i class="bi bi-star-fill gold"></i>
                                <i class="bi bi-star-fill"></i>
                            </div>

                            <h4 class="product-title">Acetaminophen Pills</h4>
                            <p class="product-desc">Short product description goes here.</p>

                            <div class="d-flex justify-content-between align-items-center price-box">
                                <span class="old-price">$18</span>
                                <span class="new-price">$12</span>
                                <button class="buy-btn">Buy Now</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="product-card position-relative">

                            <!-- Discount Badge -->
                            <span class="discount-badge">10% OFF</span>

                            <img src="{{ asset('frontend/images/product-img-1.jpg') }}" alt="product image"
                                class="product-img img-fluid">
                            <!-- Stars -->
                            <div class="stars">
                                <i class="bi bi-star-fill gold"></i>
                                <i class="bi bi-star-fill gold"></i>
                                <i class="bi bi-star-fill gold"></i>
                                <i class="bi bi-star-fill gold"></i>
                                <i class="bi bi-star-fill"></i>
                            </div>

                            <h4 class="product-title">Acetaminophen Pills</h4>
                            <p class="product-desc">Short product description goes here.</p>

                            <div class="d-flex justify-content-between align-items-center price-box">
                                <span class="old-price">$18</span>
                                <span class="new-price">$12</span>
                                <button class="buy-btn">Buy Now</button>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="product-card position-relative">
                            <span class="discount-badge">10% OFF</span>

                            <img src="{{ asset('frontend/images/product-img-1.jpg') }}" alt="product image"
                                class="product-img img-fluid">
                            <div class="stars">
                                <i class="bi bi-star-fill gold"></i>
                                <i class="bi bi-star-fill gold"></i>
                                <i class="bi bi-star-fill gold"></i>
                                <i class="bi bi-star-fill gold"></i>
                                <i class="bi bi-star-fill"></i>
                            </div>

                            <h4 class="product-title">Acetaminophen Pills</h4>
                            <p class="product-desc">Short product description goes here.</p>

                            <div class="d-flex justify-content-between align-items-center price-box">
                                <span class="old-price">$18</span>
                                <span class="new-price">$12</span>
                                <button class="buy-btn">Buy Now</button>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="product-card position-relative">
                            <span class="discount-badge">10% OFF</span>

                            <img src="{{ asset('frontend/images/product-img-1.jpg') }}" alt="product image"
                                class="product-img img-fluid">
                            <div class="stars">
                                <i class="bi bi-star-fill gold"></i>
                                <i class="bi bi-star-fill gold"></i>
                                <i class="bi bi-star-fill gold"></i>
                                <i class="bi bi-star-fill gold"></i>
                                <i class="bi bi-star-fill"></i>
                            </div>

                            <h4 class="product-title">Acetaminophen Pills</h4>
                            <p class="product-desc">Short product description goes here.</p>

                            <div class="d-flex justify-content-between align-items-center price-box">
                                <span class="old-price">$18</span>
                                <span class="new-price">$12</span>
                                <button class="buy-btn">Buy Now</button>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="product-card position-relative">
                            <span class="discount-badge">10% OFF</span>

                            <img src="{{ asset('frontend/images/product-img-1.jpg') }}" alt="product image"
                                class="product-img img-fluid">
                            <div class="stars">
                                <i class="bi bi-star-fill gold"></i>
                                <i class="bi bi-star-fill gold"></i>
                                <i class="bi bi-star-fill gold"></i>
                                <i class="bi bi-star-fill gold"></i>
                                <i class="bi bi-star-fill"></i>
                            </div>

                            <h4 class="product-title">Acetaminophen Pills</h4>
                            <p class="product-desc">Short product description goes here.</p>

                            <div class="d-flex justify-content-between align-items-center price-box">
                                <span class="old-price">$18</span>
                                <span class="new-price">$12</span>
                                <button class="buy-btn">Buy Now</button>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="text-center mt-5">
                    <button class="all-products-btn">All Products</button>
                </div>
            </div>
        </section>

    </section>
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

            </div>
        </div>
    </section>

    <section class="xray-section py-5">

        <div class="container-fluid xray-box p-4 mt-5">
            <div class="text-center mb-5">
                <h2 class="main-heading">X-Ray <span>Rent, Sales & Repairing Services</span> </h2>
            </div>
            <div class="container">
                <div class="row g-4">

                    <!-- Card 1 -->
                    <div class="col-lg-3 col-md-6">
                        <div class="xray-card p-3">
                            <h3 class="xray-title reveal-lines">
                                X-Ray Rent, Sales & Repair Services in Austin TX
                            </h3>

                            <p class="xray-desc reveal-lines">
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
            <div class="text-center mb-5">
                <h2 class="main-heading">C-Arm <span>Rent, Sales, and Repairing Services</span> </h2>
            </div>
            <div class="container">
                <div class="row g-4 justify-content-center">

                    <!-- Card 1 -->
                    <div class="col-lg-3 col-md-6">
                        <div class="xray-card p-3">
                            <h3 class="xray-title reveal-lines">
                                X-Ray Rent, Sales & Repair Services in Austin TX
                            </h3>

                            <p class="xray-desc reveal-lines">
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
                            <h3 class="xray-title reveal-lines">
                                X-Ray Rent, Sales & Repair Services in Austin TX
                            </h3>

                            <p class="xray-desc reveal-lines">
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

    <section class="medical-section py-5">
        <div class="container">

            <!-- Main Heading -->
            <h2 class="text-center mb-5 main-heading">
                Our Life-Saving Medical Equipment for Sales,<span>Services</span> & <span>Rentals</span> !
            </h2>

            <!-- 2 Columns -->
            <div class="row">

                <div class="col-8 mx-auto">

                    <div class="row">
                        <!-- LEFT COLUMN -->
                        <div class="col-lg-6 col-md-12 mb-4 mx-auto">

                            <div class="equipment-block mb-3">
                                <h4 class="equipment-title">Anesthesia Machines</h4>
                                <ul class="equipment-list">
                                    <li>Anesthesia Monitors</li>
                                    <li>Vaporizers</li>
                                    <li>Anesthesia Machines</li>
                                    <li>Portable Ultrasound</li>
                                </ul>
                            </div>

                            <div class="equipment-block mb-3">
                                <h4 class="equipment-title">Endoscopy</h4>
                                <ul class="equipment-list">
                                    <li>Cameras</li>
                                    <li>Insufflators</li>
                                    <li>Pulse Oximeters</li>
                                    <li>Scopes - Gastroscopes, Colonoscopes, Bronchoscopes, Laparoscopes…</li>
                                </ul>
                            </div>

                            <div class="equipment-block mb-3">
                                <h4 class="equipment-title">General Medical Equipment</h4>
                                <ul class="equipment-list">
                                    <li>Patient Monitors</li>
                                    <li>Vital Sign Monitors</li>
                                    <li>High-Precision Instruments</li>
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
                        <div class="col-lg-6 col-md-12 mb-4">

                            <div class="equipment-block mb-3">
                                <h4 class="equipment-title">Imaging Diagnostic Equipment</h4>
                                <ul class="equipment-list">
                                    <li>Imaging Diagnostic Equipment</li>
                                </ul>
                            </div>

                            <div class="equipment-block mb-3">
                                <h4 class="equipment-title">Surgical Equipment</h4>
                                <ul class="equipment-list">
                                    <li>Operation Lights</li>
                                    <li>Surgical Tables</li>
                                    <li>Electrosurgical Units (ESU)</li>
                                    <li>Hypothermia Units</li>
                                    <li>Stretchers / Gurneys / Hospital Beds</li>
                                    <li>COVID-19 Testing</li>
                                </ul>
                            </div>

                            <div class="equipment-block mb-3">
                                <h4 class="equipment-title">Sterilizers</h4>
                                <ul class="equipment-list">
                                    <li>Tabletop Autoclaves – Tuttnauer, Midmark, M11</li>
                                    <li>Free-Standing Autoclaves – Steris, Getinge, Belimed</li>
                                    <li>Physiotherapy Tools</li>
                                </ul>
                            </div>

                            <div class="equipment-block mb-3">
                                <h4 class="equipment-title">Ultrasound</h4>
                                <ul class="equipment-list">
                                    <li>Ultrasound Machines</li>
                                    <li>Portable X-Ray Systems</li>
                                    <li>C-Arms</li>
                                    <li>Bone Density Machines</li>
                                    <li>Radiology Rooms</li>
                                </ul>
                            </div>

                        </div>
                    </div>

                </div>

                <div class="col-8 mx-auto">
                    <p class="bottom-text">
                        We cover a full spectrum of medical equipment, ensuring you have access to everything you need.
                        Hospitals and healthcare providers trust Mr. Biomed Tech Services for clear, precise agreements and
                        targeted financing solutions.
                    </p>

                    <div class="text-start mt-4">
                        <button class=" get-btn">
                            Get in Touch with Us Today!
                        </button>
                    </div>
                </div>

            </div>

        </div>
    </section>

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


    <section class="mission-section">
        <div class="container py-5">
            <div class="row justify-content-center">

                <!-- LEFT COLUMN -->
                <div class="col-lg-4 ">
                    <div class="mx">
                        <img src="{{ asset('frontend/images/chief-img.jpg') }}" alt="oem-img"
                            class="oem-img-2 img-fluid">
                        <h3 class="ceo-name mt-3">Omar Ahmed</h3>
                        <p class="ceo-title">Chief Executive Officer</p>
                    </div>
                </div>

                <!-- RIGHT COLUMN -->
                <div class="col-lg-8">
                    <p class="mission-text ">
                        Our mission is to sell and rent professional devices with added value & services
                        for our customers. We facilitate by scanning the globe to create long-lasting
                        relationships with reputable manufacturers who, in turn, allow us to represent
                        their equipment. We also offer additional value that you cannot find from other
                        companies.
                        Our mission is to sell and rent professional devices with added value & services
                        for our customers. We facilitate by scanning the globe to create long-lasting
                        relationships with reputable manufacturers who, in turn, allow us to represent
                        their equipment. We also offer additional value that you cannot find from other
                        companies.
                    </p>

                    <button class="about-btn ">About Us</button>
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

    {{-- ================chose section========== --}}

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
    <section class="bg-section">
        <div class="overlay"></div>

        <div class="content-wrapper text-center">

            <!-- 10+ Years -->
            <div class="shadow-div">
                <h2 class="years-text">10+ Years.</h2>

                <!-- Curved Double Lines -->

            </div>
            <div class="line-wrapper">
                <div class="line-straight"></div>
                {{-- <div class="line-curve"></div> --}}
            </div>





            <!-- Review Box -->
            <div class="review-box mx-auto">

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
    {{-- <script>
        (function() {


            const slider = document.getElementById("reviewSlider");

            let slides = Array.from(slider.children);
            const visible = 5;
            const slideWidth = 180; // 140 + 40 gap
            let index = 0;

            // Duplicate slides for infinite scroll
            slides.forEach(slide => slider.appendChild(slide.cloneNode(true)));
            slides = Array.from(document.querySelectorAll(".tooltip-slide"));

            function updateSlider() {

                // remove all actives
                slides.forEach(s => s.classList.remove("active"));

                // center slide index
                const center = index + Math.floor(visible / 2);

                if (slides[center]) slides[center].classList.add("active");

                // Always center the middle image
                const offset = (visible * slideWidth) / 2 - (slideWidth / 2);
                const moveX = index * slideWidth;

                slider.style.transform = `translateX(-${moveX - offset}px)`;

                index++;

                // infinite loop reset
                if (index >= slides.length - visible) {
                    setTimeout(() => {
                        slider.style.transition = "none";
                        index = 0;
                        slider.style.transform = `translateX(-${-offset}px)`;

                        setTimeout(() => slider.style.transition = "0.6s ease", 50);
                    }, 600);
                }
            }

            setInterval(updateSlider, 2000);
            updateSlider();

        })();
    </script> --}}




    <script>
        const offerTrack = document.querySelector(".offer-slider-track");
        const offerCards = document.querySelectorAll(".offer-card");
        const offerPrev = document.querySelector(".offer-prev");
        const offerNext = document.querySelector(".offer-next");
        const offerWrapper = document.querySelector(".offer-slider-wrapper"); // NEW

        let offerIndex = 0;
        let offerVisibleCards = 4;

        function getCardWidth() {
            return offerCards[0].offsetWidth + 20;
        }

        let offerCardWidth = getCardWidth();

        function updateVisibleCards() {
            if (window.innerWidth < 576) offerVisibleCards = 1;
            else if (window.innerWidth < 992) offerVisibleCards = 2;
            else offerVisibleCards = 4;

            offerCardWidth = getCardWidth();
        }
        updateVisibleCards();
        window.addEventListener("resize", updateVisibleCards);

        const totalCards = offerCards.length / 2;

        function slideToIndex() {
            offerTrack.style.transition = "transform 1s linear";
            offerTrack.style.transform = `translateX(-${offerIndex * offerCardWidth}px)`;
        }

        function autoSlide() {
            offerIndex++;
            slideToIndex();

            if (offerIndex >= totalCards) {
                setTimeout(() => {
                    offerTrack.style.transition = "none";
                    offerIndex = 0;
                    offerTrack.style.transform = `translateX(0)`;
                }, 1000);
            }
        }

        offerNext.onclick = autoSlide;

        offerPrev.onclick = () => {
            offerIndex--;
            if (offerIndex < 0) {
                offerTrack.style.transition = "none";
                offerIndex = totalCards - 1;
            }
            slideToIndex();
        };


        let sliderInterval = setInterval(autoSlide, 3000);

        function pauseSlider() {
            clearInterval(sliderInterval);
            sliderInterval = null;
        }

        function resumeSlider() {
            if (!sliderInterval) {
                sliderInterval = setInterval(autoSlide, 3000);
            }
        }

        [offerWrapper, offerPrev, offerNext].forEach(el => {
            el.addEventListener("mouseenter", pauseSlider);
            el.addEventListener("mouseleave", resumeSlider);
        });
    </script>
    <script>
        let index = 0;
        const track = document.querySelector(".slider-track");
        const slides = document.querySelectorAll(".slide");
        const total = slides.length;

        function autoSlide() {
            index++;
            track.style.transition = "transform 0.8s ease-in-out";
            track.style.transform = `translateX(-${index * 100}%)`;

            if (index === total - 1) {

                setTimeout(() => {
                    track.style.transition = "none";
                    index = 0;
                    track.style.transform = `translateX(0%)`;
                }, 800);
            }
        }

        setInterval(autoSlide, 4000);
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
        let currentImageIndex = 0;
        const sliderContainer = document.querySelector(".image-slider-wrapper");
        const imageTrack = document.querySelector(".image-slide-track");
        const imageSlides = document.querySelectorAll(".image-slide-item");
        const totalSlides = imageSlides.length;

        const slideDuration = 5000;
        let slideInterval;

        function moveSlide() {
            currentImageIndex++;
            imageTrack.style.transition = "transform 0.8s ease-in-out";
            imageTrack.style.transform = `translateX(-${currentImageIndex * 25}%)`;


            if (currentImageIndex === totalSlides - 1) {

                setTimeout(() => {
                    imageTrack.style.transition = "none";
                    currentImageIndex = 0;
                    imageTrack.style.transform = `translateX(0%)`;
                }, 800);
            }
        }

        function startSliding() {
            if (!slideInterval) {
                slideInterval = setInterval(moveSlide, slideDuration);
            }
        }

        function stopSliding() {
            clearInterval(slideInterval);
            slideInterval = null;
        }

        sliderContainer.addEventListener('mouseenter', stopSliding);
        sliderContainer.addEventListener('mouseleave', startSliding);

        startSliding();
    </script>
@endpush
