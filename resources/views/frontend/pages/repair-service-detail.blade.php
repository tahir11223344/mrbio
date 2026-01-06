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
        }

        */ .thumbs {
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

        .service-list {
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

            <h1 class="hero-title mb-3 fade-right">{!! highlightBracketText($data->title ?? '', ['#000000']) !!}</h1>
            <p class="hero-description mx-auto mb-4 fade-left">{{ $data->short_description ?? '' }}</p>

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

                        <img id="mainImage" src="{{ asset('storage/repair-pages/' . $data->content_thumbnail) }}"
                            class="main-img">

                        {{-- <button class="next-btn">&#10095;</button> --}}
                    </div>

                    <div class="thumb-slider-container">

                        <button class="thumb-prev">&#10094;</button>

                        @if (!empty($data->all_images) && is_array($data->all_images))
                            <div class="thumb-wrapper">
                                <div class="thumbs-track" id="thumbsTrack">
                                    @foreach ($data->all_images as $img)
                                        <img src="{{ asset($img) }}" class="thumb"
                                            onclick="thumbClicked('{{ asset($img) }}')">
                                    @endforeach
                                </div>
                            </div>
                        @endif

                        <button class="thumb-next">&#10095;</button>
                    </div>
                    <div class="pagination-wrapper">
                        <div class="pagination-bar" id="paginationBar"></div>

                    </div>

                </div>

                <!-- Right Column -->
                <div class="col-lg-6">
                    <h2 class="detail-heading">{!! highlightBracketText($data->content_title ?? '') !!}</h2>
                    {{-- {!! $data->content_description ?? ''!!} --}}
                    <div class="service-list">
                        {!! $data->content_description ?? '' !!}
                    </div>

                    <button class="quote-btn" data-open-service-modal>Request A Quote</button>
                </div>

            </div>
        </div>
    </section>

    <section class="austin">
        <div class="container-fluid">

            <div class="row">
                <div class="col-md-12  mx-auto">
                    <h2 class="austin-heading">
                        {!! highlightBracketText($data->serve_heading ?? '') !!}
                    </h2>
                    <div class="austin-desc">
                        {!! $data->serve_description ?? '' !!}
                    </div>


                </div>
            </div>
        </div>
    </section>
    <section class="austin mt-5">
        <div class="container-fluid">

            <div class="row">
                <div class="col-md-12  mx-auto">
                    <h2 class="austin-heading">
                        {!! highlightBracketText($data->benefits_heading ?? '') !!}</span>
                    </h2>
                    <div class="austin-desc">
                        {!! $data->benefits_description ?? '' !!}
                    </div>

                    {{-- <ul>
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
                    </ul> --}}


                </div>
            </div>
        </div>
    </section>
    <section class="problems-section py-5">
        <div class="container">
            <div class="row ">

                <!-- LEFT COLUMN -->
                <div class="col-lg-7 mb-4">

                    <div class="section-text">
                        {!! $data->challenges_description ?? '' !!}
                    </div>
                    {{-- <h2 class="common-title">Common Problems We Solve</h2>

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

                    </p> --}}
                </div>

                <!-- RIGHT COLUMN -->
                <div class="col-lg-5 text-center">
                    <img src="{{ asset('storage/repair-pages/' . $data->challenges_image) }}"
                        alt="{{ $data->challenges_image_alt ?? '' }}" class="right-img">
                </div>

            </div>
        </div>
    </section>
    <section class="inspection-section mb-4">
        <div class="container">
            <div class="row ">

                <!-- LEFT COLUMN -->
                <div class="col-lg-6 text-center">
                    <img src="{{ asset('storage/repair-pages/' . $data->cta_thumbnail) }}"
                        alt="{{ $data->cta_image_alt ?? '' }}" class="left-img">
                </div>

                <!-- RIGHT COLUMN -->
                <div class="col-lg-6 pt-4">
                    <div class="description">
                        {!! $data->cta_description ?? '' !!}

                    </div>
                    {{-- <h3 class="top-heading">Onsite Medical Inspection Services</h3>

                    <h2 class="main-heading">
                        Let Us Get Your Facility Ready For Your Next Inspection
                    </h2>

                    <p class="description">
                        “ Bio-Medical Service, Imaging Service and Local Repair. OEM-Quality Technical Support
                        to meet your medical equipment Maintenance Need ”
                    </p> --}}

                    <h4 class="appointment-title">Make an Appointment</h4>

                    @if (setting('phone'))
                        <div class="contact-box">
                            <i class="fa-solid fa-phone contact-icon"></i>
                            <span class="contact-text">
                                <a href="tel:{{ cleanPhone(setting('phone')) }}" title="Call Us">
                                    {{ setting('phone') }}
                                </a>
                            </span>
                        </div>
                    @endif

                    @if (setting('email'))
                        <div class="contact-box">
                            <i class="fa-solid fa-envelope contact-icon"></i>
                            <span class="contact-text">
                                <a href="mailto:{{ setting('email') }}" target="_blank"
                                    title="Send us an Email">{{ setting('email') }}</a>
                            </span>
                        </div>
                    @endif
                </div>

            </div>
        </div>
    </section>

    {{-- ================= CTA Section ================= --}}
    <x-cta-section />




    {{-- ================faqs section ================ --}}

    <x-faq-section :faqs="$faqs" heading="Frequently Asked Questions" subheading=""
        subtext=""
        image="frontend/images/hero-main-img.png" :visible="4" />



    {{-- ================= pruduct sectiion ============= --}}
    <x-our-latest-products />

    {{-- ============= reveiw sectiion ================== --}}
    <x-testimonial-slider />

    {{-- ============ Recent News Section ============ --}}
    <!-- Default: 4 blogs -->
    <x-recent-blogs-section />


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
