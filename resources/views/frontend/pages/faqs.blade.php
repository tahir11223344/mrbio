@extends('frontend.layouts.frontend')

{{-- @section('title', 'Faqs page') --}}

@section('meta_title', $data->meta_title ?? 'Faqs')
@section('meta_keywords', $data->meta_keywords ?? '')
@section('meta_description', $data->meta_description ?? '')

@push('frontend-styles')
    <style>
        /* SECTION */
        .faq-section {
            position: relative;
            /* padding: 80px 20px; */
            overflow: visible;
            /* height: 100vh; */
        }

        /* 🖼️ BACKGROUND IMAGE */
        .faq-section::before {
            content: "";
            position: absolute;
            top: 44%;
            left: 50%;
            width: 90%;
            /* 👈 image width control */
            height: 85%;
            /* 👈 image height control */
            background: url('/frontend/images/faqs-logo.png') no-repeat;
            background-size: contain;
            transform: translate(-50%, -50%);
            filter: blur(3px);
            z-index: -5;
        }



        /* 🎨 OVERLAY LAYER */
        .faq-section::after {
            content: "";
            position: absolute;
            inset: 0;
            background: rgba(255, 255, 255, 0.5);
            /* zyada white */
            /* 👈 #fff overlay */
            z-index: -2;
        }

        /* 📄 CONTENT */
        .faq-section>* {
            position: relative;
            z-index: 3;
        }

        .faq-section .container {
            z-index: 9999;

        }

        /* 🔼 CONTENT LAYER */
        .faq-content {
            position: relative;
            z-index: 9999;
            background-color: #C9E0EB;
            border-radius: 6px;
            max-width: 697px;
            max-height: 67px;
            padding: 10px !important;
        }

        .faq-item {
            border-bottom: none !important;
            cursor: pointer;

        }

        /* GRID */

        .faq-title {
            max-width: 697px;
        }

        .faq-icon {
            color: #000000 !important;
            font-size: 25px !important;
            font-weight: 700;
        }


        /* RIGHT CARD */
        .contactt-card {
            background: #0A70A238;
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0px 0px 10px #00000040;
            color: #fff;
        }

        .card-title {
            font-size: 20px;
            margin-bottom: 15px;
            color: #000000;
            line-height: 100%;
            font-weight: 600;
            font-family: Inter;
        }

        .divider {
            border-bottom: 1px solid #FFFFFF;
            margin: 20px 0;
        }



        .cardd-desc {
            font-size: 14px;
            /* opacity: 0.9; */
            margin-bottom: 15px;
            color: #00000080;
            line-height: 160%;
            font-weight: 700;
            font-family: Arial;
        }

        .card-time {
            font-size: 14px;
            /* opacity: 0.9; */
            margin-bottom: 15px;
            color: #00000080;
            line-height: 160%;
            font-weight: 900;
            font-family: Arial;
        }

        /* BUTTONS */
        .btn-email,
        .btn-call {
            display: flex;
            align-items: center;
            justify-content: center;

            background: #fff;
            border-radius: 9px;
            text-decoration: none;
            font-size: 18px;
            color: #000000;
            width: 220px;
            height: 37px;
            line-height: 100%;
            font-weight: 600;
            font-family: Inter;
            clip-path: polygon(0% 0%,
                    100% 0%,
                    100% 100%,
                    0% 100%);
            transition: all 0.3s ease-in-out;
        }

        .btn-email:hover,
        .btn-call:hover {

            background: #0168A4;
            color: #FFFFFF;
            clip-path: polygon(12% 0%,
                    100% 0%,
                    88% 100%,
                    0% 100%);

        }

        .btn-email i {
            margin-right: 5px;
            font-size: 24px;
            color: #000000;
        }

        .btn-call i {
            margin-right: 5px;
            font-size: 24px;
            color: #000000;
            transform: rotate(270deg);
            /* left ki taraf */

        }

        /* RESPONSIVE */
        @media (max-width: 768px) {
            .faq-grid {
                grid-template-columns: 1fr;
            }
        }

        .contact-sectionn {
            background: #C9E0EB4D;
            padding: 60px 20px;
            z-index: 3;
            position: relative;

        }



        /* FORM */
        .contact-form {
            display: flex;
            flex-direction: column;
            gap: 20px;
            max-width: 1000px;
            /* form ka maximum width */
            margin: 0 auto;
            /* horizontally center */
            z-index: 4;
            position: relative;

        }

        .contact-title {
            font-family: Saira;
            font-weight: 600;
            font-size: 40px;
            line-height: 120%;
            color: #000000;

            position: relative;
            /* 👈 REQUIRED */
            z-index: 5;
            /* 👈 ab kaam karega */
            margin-bottom: 40px;
        }

        .contact-desc {
            font-family: Inter;
            font-weight: 6500;
            font-size: 20px;
            line-height: 100%;
            color: #000000B5;

            position: relative;
            /* 👈 REQUIRED */
            z-index: 5;
            margin-bottom: 40px;

        }

        .form-row {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: space-between;
            max-width: 1039px;

        }

        .form-roww {
            display: inline-flex;
            flex-wrap: wrap;
            /* gap: 50px; */
            /* justify-content: center; */
            /* max-width: 1039px; */

        }

        .input-field {
            padding: 12px 15px;
            border-radius: 8px;
            border: 1px solid #000000B2;
            font-size: 16px;
            box-sizing: border-box;
            height: 57px;
            background-color: #EFF6F94D;
            /* 👈 input bg */
        }

        .input-field:focus {
            outline: none;
            border: 2px solid #000000B2;
            /* background-color: #EFF6F9; */
            background-color: #EFF6F94D;

        }


        .form-group label {
            font-size: 20px;
            margin-bottom: 8px;
            color: #000000;
            line-height: 100%;
            font-weight: 700;
            font-family: Inter;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            margin-top: 20px;
        }

        /* Specific widths */
        .half-width {
            width: 429px;
        }

        .full-width {
            width: 1039px;
        }

        .message-field {
            height: 189px;
        }

        .btn-send {
            background: #0168A4;
            color: #FFFFFF;
            border: none;
            padding: 0px 20px;
            border-radius: 10px;
            cursor: pointer;
            transition: all 0.3s ease;
            width: 132px;
            height: 43px;
            box-shadow: 0px 4px 4px #00000040;
            font-size: 20px;
            /* color: #000000; */
            line-height: 100%;
            font-weight: 600;
            font-family: Inter;
            clip-path: polygon(0% 0%,
                    100% 0%,
                    100% 100%,
                    0% 100%);
            transition: all 0.6s ease-in-out;
        }

        .btn-send:hover {
            background: #014F7A;

            width: 332px;

        }

        /* RESPONSIVE */
        @media (max-width: 1200px) {

            .half-width,
            .full-width {
                width: 100%;
            }
        }
    </style>
@endpush



@section('frontend-content')

    <section class="hero-detail-section">
        <div class="container py-5 text-center text-white">

            <h1 class="hero-title mb-3 fade-left">{!! highlightBracketText($data->hero_title ?? '', ['#000000']) !!}</span></h1>

            <p class="hero-description mx-auto mb-4 fade-right">
                {{ $data->hero_subtitle ?? '' }}
            </p>

            <div class="container py-5 text-center text-white">
                <div class="simple-breadcrumb-container text-start mx-auto">
                    <div class="simple-breadcrumb">

                        <a href="{{ route('home') }}" class="breadcrumb-link">Home</a>

                        <span class="breadcrumb-separator">|</span>

                        <span class="breadcrumb-active">FAQs</span>
                    </div>
                </div>

            </div>

        </div>
    </section>
    <section class="faq-section py-5">
        <div class="container">
            <div class="row g-4">

                <!-- LEFT COLUMN -->
                <div class="col-lg-8 col-md-7">
                    <h2 class="faqs-heading">Frequently Asked Questions</h2>
                    {{-- <div class="mt-4">
                        <h5 class="faqs-subheading">About Our Profile?</h5>
                        <p class="faq-para">
                            We provide sales, rental, and repair services for medical equipment with ISO certified
                        </p>
                    </div> --}}

                    <div class="faqs-list">
                        @if (isset($faqs) && $faqs->isNotEmpty())
                            @foreach ($faqs as $faq)
                                <!-- Sample FAQs -->
                                <div class="faq-item">
                                    <div class="faq-title">
                                        {{ $faq->question ?? '' }}
                                        <i class="bi bi-chevron-down faq-icon"></i>
                                    </div>
                                    <div class="faq-content">
                                        {!! $faq->answer !!}
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <p>No FAQs available at the moment.</p>
                        @endif
                    </div>

                    <button class="btn-see-more">See More</button>
                </div>

                <!-- RIGHT COLUMN -->
                <div class="col-lg-4 col-md-5">
                    <div class="contactt-card">

                        <h4 class="card-title">
                            Got Unanswered Questions? We’re Here to Help!
                        </h4>

                        <div class="divider"></div>

                        <!-- EMAIL -->
                        <h5 class="card-title">Email Us</h5>
                        <p class="cardd-desc">
                            Have questions or need assistance? Our team is ready to respond with quick and helpful
                            solutions. Whether it's a general inquiry or a more detailed request, we’re just an email away!
                        </p>

                        <div class="d-flex justify-content-center">
                            <a href="mailto:{{ setting('email') }}" class="btn-email">
                                <i class="fa-solid fa-envelope"></i>
                                Email Us
                            </a>
                        </div>

                        <div class="divider"></div>

                        <!-- CALL -->
                        <h5 class="card-title">Call Us</h5>
                        <p class="cardd-desc">Our Sales team is here to help</p>
                        <p class="card-time">Monday – Friday 9am to 5pm GMT</p>
                        <div class="d-flex justify-content-center">
                            <a href="tel:{{ cleanPhone(setting('phone')) }}" class="btn-call">
                                <i class="fa-solid fa-phone icon"></i> {{ setting('phone') }}
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>



        <section class="contact-sectionn my-5">
            <div class="container mb-5">
                <h2 class="contact-title text-center">Still Looking For answers?</h2>
                <p class="contact-desc text-center">We are here to help you with any questions you may have. Fill out the
                    form below and
                    our
                    team will get back to you.</p>

                <form class="contact-form" id="consultancyForm" action="{{ route('consultancy.submit') }}" method="POST">
                    @csrf
                    <!-- Row 1: Name & Email -->
                    <div class="form-row">
                        <div class="form-group half-width">
                            <label for="name">Name *</label>
                            <input type="text" id="name" name="name" class="input-field" required>
                            <span class="text-danger error-text name_error"></span>
                        </div>
                        <div class="form-group half-width">
                            <label for="email">Email *</label>
                            <input type="email" id="email" name="email" class="input-field" required>
                            <span class="text-danger error-text email_error"></span>
                        </div>
                    </div>

                    <!-- Row 2: Organization, Phone, Select -->
                    <div class="form-row">
                        <div class="form-group full-width">
                            <label for="organization">Organization</label>
                            <input type="text" id="organization" name="organization" class="input-field">
                            <span class="text-danger error-text organization_error"></span>
                        </div>
                        <div class="form-group full-width">
                            <label for="phone">Phone</label>
                            <input type="text" id="phone" name="phone" class="input-field">
                            <span class="text-danger error-text phone_error"></span>
                        </div>
                        <div class="form-group full-width">
                            <label for="help">How can we help?</label>
                            <input list="helpOptions" id="help" name="help" class="input-field">
                            <span class="text-danger error-text help_error"></span>

                            <datalist id="helpOptions">
                                @foreach (getConsultancyServicesList() as $service)
                                    <option value="{{ $service }}"></option>
                                @endforeach
                            </datalist>
                        </div>
                    </div>

                    <!-- Row 3: Message -->
                    <div class="form-row">
                        <div class="form-group full-width">
                            <label for="message">Message *</label>
                            <textarea id="message" name="message" class="input-field message-field" required></textarea>
                            <span class="text-danger error-text message_error"></span>
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <script src="https://www.google.com/recaptcha/api.js" async defer></script>
                        <div class="g-recaptcha w-100" data-sitekey="{{ config('services.recaptcha.sitekey') }}">
                        </div>
                        <span class="text-danger error-text g-recaptcha-response_error"></span>
                    </div>

                    <!-- Row 4: Send Button -->
                    <div class="form-row">
                        <button type="submit" class="btn-send">Send</button>
                    </div>
                </form>


            </div>
        </section>
    </section>
    {{-- ================= CTA Section ================= --}}
    <x-cta-section />


    {{-- ================= pruduct sectiion ============= --}}
    <x-our-latest-products />


@endsection


@push('frontend-scripts')
    <script>
        $(document).ready(function() {

            $(document).on('submit', '#consultancyForm', function(e) {
                e.preventDefault();

                let form = $(this);

                // Clear previous errors
                form.find('.error-text').text('');
                form.find('.invalid-feedback').remove();

                $.ajax({
                    url: form.attr('action'),
                    method: 'POST',
                    data: form.serialize(),
                    dataType: 'json',

                    success: function(response) {
                        if (response.success) {
                            form[0].reset();

                            // Reset captcha
                            if (typeof grecaptcha !== 'undefined') {
                                grecaptcha.reset();
                            }

                            // Show toastr success
                            if (typeof toastr !== 'undefined') {
                                toastr.success(response.message);
                            } else {
                                alert(response.message);
                            }
                        }
                    },

                    error: function(xhr) {
                        if (xhr.status === 422) {
                            let errors = xhr.responseJSON.errors;

                            $.each(errors, function(key, value) {
                                let errorField = form.find('.' + key + '_error');

                                if (errorField.length) {
                                    errorField.text(value[0]);
                                } else {
                                    // For captcha or non-input errors
                                    form.find('[name="' + key + '"]').after(
                                        '<div class="invalid-feedback d-block">' +
                                        value[0] + '</div>'
                                    );
                                }
                            });

                            if (typeof toastr !== 'undefined') {
                                toastr.error('Please fix the errors in the form.');
                            }

                        } else {
                            if (typeof toastr !== 'undefined') {
                                toastr.error('Something went wrong. Please try again later.');
                            } else {
                                alert('Something went wrong. Please try again later.');
                            }
                        }
                    }
                });
            });

        });
    </script>
@endpush
