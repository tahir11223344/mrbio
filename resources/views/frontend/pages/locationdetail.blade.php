@extends('frontend.layouts.frontend')

{{-- @section('title', 'Location Detail Page') --}}
@section('meta_title', $data->meta_title ?? 'Serving City')
@section('meta_keywords', $data->meta_keywords ?? '')
@section('meta_description', $data->meta_description ?? '')

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

            <h1 class="hero-title mb-3 fade-right">{!! highlightBracketText($data->hero_title ?? '', ['#000000']) !!}</h1>
            <p class="hero-description mx-auto mb-4 fade-left">
                {{ $data->hero_subtitle ?? '' }}
            </p>

            <div class="container py-5 text-center text-white">
                <div class="simple-breadcrumb-container text-start mx-auto">
                    <div class="simple-breadcrumb">

                        <a href="/" class="breadcrumb-link">Home</a>

                        <span class="breadcrumb-separator">|</span>

                        <span class="breadcrumb-active">{{ $data->city_name ?? '' }}</span>
                    </div>
                </div>

            </div>

        </div>
    </section>
    <section class="biomed-section">
        <div class="container">
            <div class="row justify-content-cente mt-2">
                @php
                    $galleryImages = json_decode($data->gallery_images, true) ?? [];
                    $mainImage = $galleryImages[0] ?? null;
                @endphp
                <!-- Left Column -->
                <div class="col-lg-6">

                    <div class="image-slider">
                        {{-- <button class="prev-btn">&#10094;</button> --}}

                        <img id="mainImage" src="{{ $mainImage ? asset('storage/cities/gallery/' . $mainImage) : '' }}"
                            class="main-img" alt="{{ $data->image_alt ?? '' }}">

                        {{-- <button class="next-btn">&#10095;</button> --}}
                    </div>

                    <div class="thumb-slider-container">

                        <button class="thumb-prev">&#10094;</button>

                        <!-- WRAPPER ADDED HERE -->
                        <div class="thumb-wrapper">
                            <div class="thumbs-track" id="thumbsTrack">
                                @foreach ($galleryImages as $img)
                                    <img src="{{ asset('storage/cities/gallery/' . $img) }}" class="thumb"
                                        alt="{{ $img->image_alt ?? '' }}"
                                        onclick="thumbClicked('{{ asset('storage/cities/gallery/' . $img) }}')">
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
                    <h2 class="subb-heading">{!! highlightBracketText($data->content_title ?? '') !!}</h2>

                    {!! $data->content_description ?? '' !!}
                    {{-- <p class="subb-para">
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
                    </p> --}}

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
                        {!! highlightBracketText($data->serve_heading ?? '') !!}
                    </h2>

                    {!! $data->serve_description ?? '' !!}

                    {{-- <p class="austin-desc">
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
                    </p> --}}


                </div>
            </div>
        </div>
    </section>


    {{-- ================faqs section ================ --}}

    <x-faq-section :faqs="$faqs" heading="Frequently Asked Questions" subheading="About Our Profile?"
        subtext="We provide sales, rental, and repair services for medical equipment with ISO certified"
        image="frontend/images/hero-main-img.png" :visible="4" />



    {{-- ================= pruduct sectiion ============= --}}
    <x-our-latest-products />


    {{-- ============= reveiw sectiion ================== --}}

    <section>
        <h2 class="review-heading">Our Users Are <span>Happy And Healthy</span></h2>

        <div class="container">

            <div class="mx-auto main-wrapper" style="width:1100px;">

                <div class="swiper reviewSwiper">
                    <div class="swiper-wrapper">

                        <!-- Slide 1 -->
                        <div class="swiper-slide tooltip-slide">
                            <img src="{{ asset('frontend/images/hero-img-1.jpg') }}" alt="">
                            <div class="tooltip-box">
                                <div class="starss">
                                    <i class="fas fa-star "></i>
                                    <i class="fas fa-star "></i>
                                    <i class="fas fa-star "></i>
                                    <i class="fas fa-star "></i>
                                    <i class="fas diff fa-star "></i>
                                </div>
                                <p>

                                    <span class="quote">“</span> "Pharmacy Store is my go-to for over-the-counter
                                    medications and health products. They
                                    have a wide selection, and their website makes it easy to order online. The only
                                    improvement I'd suggest is expanding their beauty and skincare section."
                                </p>
                            </div>
                        </div>

                        <!-- Slide 2 -->
                        <div class="swiper-slide tooltip-slide">
                            <img src="{{ asset('frontend/images/hero-img-4.jpg') }}">
                            <div class="tooltip-box">
                                <div class="starss">
                                    <i class="fas fa-star "></i>
                                    <i class="fas fa-star "></i>
                                    <i class="fas fa-star "></i>
                                    <i class="fas fa-star "></i>
                                    <i class="fas fa-star diff"></i>
                                </div>
                                <p>
                                    <span class="quote">“</span>
                                    "Pharmacy Store is my go-to for over-the-counter medications and health products. They
                                    have a wide selection, and their website makes it easy to order online. The only
                                    improvement I'd suggest is expanding their beauty and skincare section."
                                </p>
                            </div>
                        </div>

                        <!-- Slide 3 -->
                        <div class="swiper-slide tooltip-slide">
                            <img src="{{ asset('frontend/images/hero-img-3.jpg') }}">
                            <div class="tooltip-box">
                                <div class="starss">
                                    <i class="fas fa-star "></i>
                                    <i class="fas fa-star "></i>
                                    <i class="fas fa-star "></i>
                                    <i class="fas fa-star "></i>
                                    <i class="fas fa-star diff"></i>
                                </div>
                                <p>
                                    <span class="quote">“</span>
                                    "Pharmacy Store is my go-to for over-the-counter medications and health products. They
                                    have a wide selection, and their website makes it easy to order online. The only
                                    improvement I'd suggest is expanding their beauty and skincare section."
                                </p>
                            </div>
                        </div>

                        <!-- Slide 4 -->
                        <div class="swiper-slide tooltip-slide">
                            <img src="{{ asset('frontend/images/hero-img-2.jpg') }}">
                            <div class="tooltip-box">
                                <div class="starss">
                                    <i class="fas fa-star "></i>
                                    <i class="fas fa-star "></i>
                                    <i class="fas fa-star "></i>
                                    <i class="fas fa-star "></i>
                                    <i class="fas fa-star diff "></i>
                                </div>
                                <p>
                                    <span class="quote">“</span>
                                    "Pharmacy Store is my go-to for over-the-counter medications and health products. They
                                    have a wide selection, and their website makes it easy to order online. The only
                                    improvement I'd suggest is expanding their beauty and skincare section."
                                </p>
                            </div>
                        </div>

                        <!-- Slide 5 -->
                        <div class="swiper-slide tooltip-slide">
                            <img src="{{ asset('frontend/images/hero-img-1.jpg') }}">
                            <div class="tooltip-box">
                                <div class="starss">
                                    <i class="fas fa-star "></i>
                                    <i class="fas fa-star "></i>
                                    <i class="fas fa-star "></i>
                                    <i class="fas fa-star "></i>
                                    <i class="fas diff fa-star "></i>
                                </div>
                                <p>
                                    <span class="quote">“</span>
                                    "Pharmacy Store is my go-to for over-the-counter medications and health products. They
                                    have a wide selection, and their website makes it easy to order online. The only
                                    improvement I'd suggest is expanding their beauty and skincare section."
                                </p>
                            </div>
                        </div>
                        <div class="swiper-slide tooltip-slide">
                            <img src="{{ asset('frontend/images/hero-img-1.jpg') }}">
                            <div class="tooltip-box">
                                <div class="starss">
                                    <i class="fas fa-star "></i>
                                    <i class="fas fa-star "></i>
                                    <i class="fas fa-star "></i>
                                    <i class="fas fa-star "></i>
                                    <i class="fas fa-star diff"></i>
                                </div>
                                <p>
                                    <span class="quote">“</span>
                                    "Pharmacy Store is my go-to for over-the-counter medications and health products. They
                                    have a wide selection, and their website makes it easy to order online. The only
                                    improvement I'd suggest is expanding their beauty and skincare section."
                                </p>
                            </div>
                        </div>
                        <div class="swiper-slide tooltip-slide">
                            <img src="{{ asset('frontend/images/hero-img-1.jpg') }}">
                            <div class="tooltip-box">
                                <div class="starss">
                                    <i class="fas fa-star "></i>
                                    <i class="fas fa-star "></i>
                                    <i class="fas fa-star "></i>
                                    <i class="fas fa-star "></i>
                                    <i class="fas fa-star diff"></i>
                                </div>
                                <p>
                                    <span class="quote">“</span>
                                    "Pharmacy Store is my go-to for over-the-counter medications and health products. They
                                    have a wide selection, and their website makes it easy to order online. The only
                                    improvement I'd suggest is expanding their beauty and skincare section."
                                </p>
                            </div>
                        </div>
                        <div class="swiper-slide tooltip-slide">
                            <img src="{{ asset('frontend/images/hero-img-1.jpg') }}">
                            <div class="tooltip-box">
                                <div class="starss">
                                    <i class="fas fa-star "></i>
                                    <i class="fas fa-star "></i>
                                    <i class="fas fa-star "></i>
                                    <i class="fas fa-star "></i>
                                    <i class="fas fa-star diff"></i>
                                </div>
                                <p>
                                    <span class="quote">“</span>
                                    "Pharmacy Store is my go-to for over-the-counter medications and health products. They
                                    have a wide selection, and their website makes it easy to order online. The only
                                    improvement I'd suggest is expanding their beauty and skincare section."
                                </p>
                            </div>
                        </div>
                        <div class="swiper-slide tooltip-slide">
                            <img src="{{ asset('frontend/images/hero-img-1.jpg') }}">
                            <div class="tooltip-box">
                                <div class="starss">
                                    <i class="fas fa-star "></i>
                                    <i class="fas fa-star "></i>
                                    <i class="fas fa-star "></i>
                                    <i class="fas fa-star "></i>
                                    <i class="fas fa-star diff"></i>
                                </div>
                                <p>
                                    <span class="quote">“</span>
                                    "Pharmacy Store is my go-to for over-the-counter medications and health products. They
                                    have a wide selection, and their website makes it easy to order online. The only
                                    improvement I'd suggest is expanding their beauty and skincare section."
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>




    {{-- ============ Recent News Section ============ --}}
    <!-- Default: 4 blogs -->
    <x-recent-blogs-section />

@endsection

@push('frontend-scripts')
@endpush
