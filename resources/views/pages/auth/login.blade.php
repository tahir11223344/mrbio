<x-auth-layout>

    <!--begin::Form-->
    <form method="POST" class="form w-100" id="kt_sign_in_form"
        action="{{ route('login') }}">
        @csrf
        <!--begin::Heading-->
        <div class="text-center mb-11">
            <!--begin::Title-->
            <h1 class="text-gray-900 fw-bolder mb-3">
                Sign In
            </h1>
            <!--end::Title-->

            {{-- <div class="text-gray-500 fw-semibold fs-6">
                Your Social Campaigns
            </div> --}}
        </div>

        {{-- <div class="row g-3 mb-9">
            <div class="col-md-6">
                <a href="{{ url('/auth/redirect/google') }}?redirect_uri={{ url()->current() }}"
                    class="btn btn-flex btn-outline btn-text-gray-700 btn-active-color-primary bg-state-light flex-center text-nowrap w-100">
                    <img alt="Logo" src="{{ image('svg/brand-logos/google-icon.svg') }}" class="h-15px me-3" />
                    Sign in with Google
                </a>
            </div>

            <div class="col-md-6">
                <a href="#"
                    class="btn btn-flex btn-outline btn-text-gray-700 btn-active-color-primary bg-state-light flex-center text-nowrap w-100">
                    <img alt="Logo" src="{{ image('svg/brand-logos/apple-black.svg') }}"
                        class="theme-light-show h-15px me-3" />
                    <img alt="Logo" src="{{ image('svg/brand-logos/apple-black-dark.svg') }}"
                        class="theme-dark-show h-15px me-3" />
                    Sign in with Apple
                </a>
            </div>
        </div>

        <div class="separator separator-content my-14">
            <span class="w-125px text-gray-500 fw-semibold fs-7">Or with email</span>
        </div> --}}

        <!--begin::Input group--->
        <div class="fv-row mb-8">
            <!--begin::Email-->
            <input type="text" placeholder="Email" name="email" autocomplete="off"
                class="form-control bg-transparent @error('email') is-invalid @enderror" 
                value="{{ old('email') }}" />
            <!--end::Email-->
            @error('email')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>

        <!--end::Input group--->
        <div class="fv-row mb-3">
            <!--begin::Password-->
            <div class="position-relative">
                <input type="password" placeholder="Password" name="password" autocomplete="off"
                    class="form-control bg-transparent @error('password') is-invalid @enderror" />
                <span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2" 
                    data-kt-password-toggle="true">
                    <i class="bi bi-eye-slash fs-2"></i>
                    <i class="bi bi-eye fs-2 d-none"></i>
                </span>
            </div>
            <!--end::Password-->
            @error('password')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>
        <!--end::Input group--->

        <!--begin::Wrapper-->
        <div class="d-flex flex-stack flex-wrap gap-3 fs-base fw-semibold mb-8">
            <div></div>

            <!--begin::Link-->
            <a href="{{ route('password.request') }}" class="link-primary">
                Forgot Password ?
            </a>
            <!--end::Link-->
        </div>
        <!--end::Wrapper-->

        <!--begin::Submit button-->
        <div class="d-grid mb-10">
            <button type="submit" id="kt_sign_in_submit" class="btn btn-primary">
                @include('partials/general/_button-indicator', ['label' => 'Sign In'])
            </button>
        </div>
        <!--end::Submit button-->

        <!--begin::Sign up-->
        <div class="text-gray-500 text-center fw-semibold fs-6">
            Not a Member yet?

            <a href="{{ route('register') }}" class="link-primary">
                Sign up
            </a>
        </div>
        <!--end::Sign up-->
    </form>
    <!--end::Form-->

    @push('scripts')
    <script>
        // Disable KTSigninGeneral before it initializes
        window.KTSigninGeneral = { init: function() { console.log('FormValidation disabled'); } };
    </script>
    <script src="{{ asset('assets/js/custom/fix-login-validation.js') }}"></script>
    <script src="{{ asset('assets/js/custom/password-toggle.js') }}"></script>
    
    @if($errors->any())
        <script>
            // Show validation errors as SweetAlert modal
            Swal.fire({
                text: "{{ $errors->first() }}",
                icon: "error",
                buttonsStyling: false,
                confirmButtonText: "Ok, got it!",
                customClass: {
                    confirmButton: "btn btn-primary"
                }
            });
        </script>
    @endif
    
    @if(session('success'))
        <script>
            // Show success message as SweetAlert modal
            Swal.fire({
                text: "{{ session('success') }}",
                icon: "success",
                buttonsStyling: false,
                confirmButtonText: "Ok, got it!",
                customClass: {
                    confirmButton: "btn btn-primary"
                }
            });
        </script>
    @endif
    @endpush

</x-auth-layout>
