@extends('frontend.layouts.frontend')

{{-- @section('title', 'Privacy Policy Page') --}}

@section('meta_title', $data->meta_title ?? 'Privacy Policy')
@section('meta_keywords', $data->meta_keywords ?? '')
@section('meta_description', $data->meta_description ?? '')

@push('frontend-styles')
   <style>
    
   </style>
@endpush



@section('frontend-content')

    <section class="hero-detail-section">
        <div class="container py-5 text-center text-white">

            <h1 class="hero-title mb-3">{!! highlightBracketText($data->hero_title ?? '', ['#000000']) !!}</h1>

            <p class="hero-description mx-auto mb-4">
                {{ $data->hero_subtitle ?? '' }}
            </p>

            <div class="container py-5 text-center text-white">
                <div class="simple-breadcrumb-container text-start mx-auto">
                    <div class="simple-breadcrumb">

                        <a href="{{ route('home') }}" class="breadcrumb-link">Home</a>

                        <span class="breadcrumb-separator">|</span>

                        <span class="breadcrumb-active">Privacy Policy</span>
                    </div>
                </div>

            </div>

        </div>
    </section>


    <section class="py-5 ">
        <div class="container">

            <!-- Page Title -->


            <!-- Policy Content -->
            <div class="card  border-0 p-4">
                {!! $data->content ?? '' !!}
                {{-- <p>
                    Welcome to our Privacy Policy section. This page explains how we collect, use,
                    protect, and share your personal information when you use our website or services.
                    Welcome to our Privacy Policy section. This page explains how we collect, use,
                    protect, and share your personal information when you use our website or services.
                    Welcome to our Privacy Policy section. This page explains how we collect, use,
                    protect, and share your personal information when you use our website or services.
                    Welcome to our Privacy Policy section. This page explains how we collect, use,
                    protect, and share your personal information when you use our website or services.
                </p>

                <h4 class="fw-bold mt-4 mb-3"> Information We Collect</h4>
                <p> Welcome to our Privacy Policy section. This page explains how we collect, use,
                    protect, and share your personal information when you use our website or services.
                    Welcome to our Privacy Policy section. This page explains how we collect, use,
                    protect, and share your personal information when you use our website or services.
                    Welcome to our Privacy Policy section. This page explains how we collect, use,
                    protect, and share your personal information when you use our website or services.</p>

                <h4 class="fw-bold mt-4 mb-3"> How We Use Your Information</h4>
                <p>
                    We use your information to provide services, improve user experience,
                    enhance security, process transactions, and send updates or notifications.
                    We use your information to provide services, improve user experience,
                    enhance security, process transactions, and send updates or notifications.
                </p>

                <h4 class="fw-bold mt-4 mb-3"> Cookies & Tracking Technologies</h4>
                <p>
                    Our website may use cookies to analyze usage, remember preferences, and
                    deliver personalized content.
                    Our website may use cookies to analyze usage, remember preferences, and
                    deliver personalized content.
                </p>

                <h4 class="fw-bold mt-4 mb-3"> Data Protection & Security</h4>
                <p>
                    We use industry-standard security measures to protect your data against
                    unauthorized access, misuse, or disclosure. Our website may use cookies to analyze usage, remember
                    preferences, and
                    deliver personalized content.
                </p>

                <h4 class="fw-bold mt-4 mb-3"> Third-Party Services</h4>
                <p>
                    We may share limited information with trusted third-party service providers
                    for analytics, hosting, payments, and marketing purposes.
                    Our website may use cookies to analyze usage, remember preferences, and
                    deliver personalized content.
                    We may share limited information with trusted third-party service providers
                    for analytics, hosting, payments, and marketing purposes.
                    Our website may use cookies to analyze usage, remember preferences, and
                    deliver personalized content.
                </p>

                <h4 class="fw-bold mt-4 mb-3"> Your Rights</h4>
                <ul>
                    <li>Right to Access</li>
                    <li>Right to Update or Delete Data</li>
                    <li>Right to Withdraw Consent</li>
                    <li>Right to Data Portability</li>
                </ul>

                <h4 class="fw-bold mt-4 mb-3"> Contact Us</h4>
                <p>
                    If you have any questions regarding this Privacy Policy, feel free to contact us:
                    <br>Email: support@example.com
                </p> --}}
            </div>

        </div>
    </section>

    <!-- Privacy Policy Page -->
    <x-important-links :for_page="'privacy_policy'" />

@endsection

@push('frontend-scripts')
@endpush
